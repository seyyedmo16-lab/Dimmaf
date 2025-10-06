<?php

/**
 * Migration Test Script
 * 
 * This script provides quick tests to verify the migration was successful.
 * Run this after completing the database migration.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MigrationTester
{
    private $connection;
    
    public function __construct()
    {
        // Initialize Laravel application
        $app = require_once __DIR__ . '/../bootstrap/app.php';
        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
        
        $this->connection = DB::connection();
    }
    
    /**
     * Test database connection
     */
    public function testConnection()
    {
        try {
            $this->connection->getPdo();
            echo "✅ Database connection successful\n";
            return true;
        } catch (Exception $e) {
            echo "❌ Database connection failed: " . $e->getMessage() . "\n";
            return false;
        }
    }
    
    /**
     * Test table existence
     */
    public function testTables()
    {
        $expectedTables = [
            'users', 'states', 'categories', 'blogs', 'contacts', 
            'faqs', 'infoes', 'what_do_we', 'about_us', 'cache', 'jobs', 'failed_jobs'
        ];
        
        $missingTables = [];
        
        foreach ($expectedTables as $table) {
            if (!Schema::hasTable($table)) {
                $missingTables[] = $table;
            }
        }
        
        if (empty($missingTables)) {
            echo "✅ All required tables exist\n";
            return true;
        } else {
            echo "❌ Missing tables: " . implode(', ', $missingTables) . "\n";
            return false;
        }
    }
    
    /**
     * Test data integrity
     */
    public function testDataIntegrity()
    {
        $tests = [
            'users' => 'SELECT COUNT(*) as count FROM users',
            'states' => 'SELECT COUNT(*) as count FROM states',
            'categories' => 'SELECT COUNT(*) as count FROM categories',
            'faqs' => 'SELECT COUNT(*) as count FROM faqs',
        ];
        
        $allPassed = true;
        
        foreach ($tests as $table => $query) {
            try {
                $result = $this->connection->selectOne($query);
                if ($result->count > 0) {
                    echo "✅ Table '{$table}' has {$result->count} records\n";
                } else {
                    echo "⚠️  Table '{$table}' is empty\n";
                }
            } catch (Exception $e) {
                echo "❌ Error testing table '{$table}': " . $e->getMessage() . "\n";
                $allPassed = false;
            }
        }
        
        return $allPassed;
    }
    
    /**
     * Test foreign key constraints
     */
    public function testForeignKeys()
    {
        try {
            // Test contacts -> states relationship
            $orphanedContacts = $this->connection->selectOne(
                'SELECT COUNT(*) as count FROM contacts c 
                 LEFT JOIN states s ON c.state_id = s.id 
                 WHERE s.id IS NULL'
            );
            
            if ($orphanedContacts->count == 0) {
                echo "✅ Foreign key constraints are valid\n";
                return true;
            } else {
                echo "❌ Found {$orphanedContacts->count} orphaned contacts\n";
                return false;
            }
        } catch (Exception $e) {
            echo "❌ Error testing foreign keys: " . $e->getMessage() . "\n";
            return false;
        }
    }
    
    /**
     * Test unique constraints
     */
    public function testUniqueConstraints()
    {
        try {
            // Test unique email constraint
            $duplicateEmails = $this->connection->selectOne(
                'SELECT COUNT(*) as count FROM (
                    SELECT email, COUNT(*) FROM users GROUP BY email HAVING COUNT(*) > 1
                ) duplicates'
            );
            
            if ($duplicateEmails->count == 0) {
                echo "✅ Unique constraints are valid\n";
                return true;
            } else {
                echo "❌ Found {$duplicateEmails->count} duplicate emails\n";
                return false;
            }
        } catch (Exception $e) {
            echo "❌ Error testing unique constraints: " . $e->getMessage() . "\n";
            return false;
        }
    }
    
    /**
     * Run all tests
     */
    public function runAllTests()
    {
        echo "🧪 Running Migration Tests...\n\n";
        
        $tests = [
            'Connection' => [$this, 'testConnection'],
            'Tables' => [$this, 'testTables'],
            'Data Integrity' => [$this, 'testDataIntegrity'],
            'Foreign Keys' => [$this, 'testForeignKeys'],
            'Unique Constraints' => [$this, 'testUniqueConstraints'],
        ];
        
        $results = [];
        
        foreach ($tests as $testName => $testMethod) {
            echo "Testing {$testName}...\n";
            $results[$testName] = call_user_func($testMethod);
            echo "\n";
        }
        
        $passed = array_sum($results);
        $total = count($results);
        
        echo "📊 Test Results: {$passed}/{$total} tests passed\n";
        
        if ($passed === $total) {
            echo "🎉 All tests passed! Migration appears successful.\n";
        } else {
            echo "⚠️  Some tests failed. Please review the issues above.\n";
        }
        
        return $passed === $total;
    }
}

// Run tests if script is executed directly
if (php_sapi_name() === 'cli') {
    $tester = new MigrationTester();
    $tester->runAllTests();
}
