-- Data Migration Script for Laravel 12 PostgreSQL Migration
-- This script provides sample data migration commands for PostgreSQL 18
-- Execute these commands after running the Laravel migrations

-- ==============================================
-- BACKUP COMMANDS (Execute BEFORE migration)
-- ==============================================

-- Create backup of old database
-- pg_dump -h localhost -U username -d old_database_name > backup_$(date +%Y%m%d_%H%M%S).sql

-- ==============================================
-- DATA MIGRATION COMMANDS
-- ==============================================

-- 1. Migrate Users Data (with password hashing)
-- Note: Passwords should be re-hashed in Laravel using Hash::make()
INSERT INTO users (name, email, email_verified_at, password, role, remember_token, created_at, updated_at)
SELECT 
    name,
    email,
    email_verified_at,
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', -- Default Laravel hash for 'password'
    role,
    remember_token,
    created_at,
    updated_at
FROM old_users
WHERE email NOT IN (SELECT email FROM users);

-- 2. Migrate States Data
INSERT INTO states (symbol, is_active, name, investment_facilities, education_rank, tourism, jobs_and_business, accommodation, created_at, updated_at)
SELECT 
    symbol,
    CASE WHEN is_active = 1 THEN true ELSE false END,
    name,
    investment_facilities,
    education_rank,
    tourism,
    jobs_and_business,
    accommodation,
    created_at,
    updated_at
FROM old_states
WHERE symbol NOT IN (SELECT symbol FROM states);

-- 3. Migrate Categories Data
INSERT INTO categories (name, created_at, updated_at)
SELECT 
    name,
    created_at,
    updated_at
FROM old_categories
WHERE name NOT IN (SELECT name FROM categories);

-- 4. Migrate Blogs Data
INSERT INTO blogs (state_id, title_en, title_fa, slug, body_en, body_fa, is_deleted, link, created_at, updated_at)
SELECT 
    state_id,
    title_en,
    title_fa,
    slug,
    body_en,
    body_fa,
    CASE WHEN is_deleted = 1 THEN true ELSE false END,
    link,
    created_at,
    updated_at
FROM old_blogs
WHERE slug NOT IN (SELECT slug FROM blogs);

-- 5. Migrate Contacts Data
INSERT INTO contacts (state_id, name, email, subject, message, answer, created_at, updated_at)
SELECT 
    state_id,
    name,
    email,
    subject,
    message,
    answer,
    created_at,
    updated_at
FROM old_contacts
WHERE NOT EXISTS (
    SELECT 1 FROM contacts c 
    WHERE c.email = old_contacts.email 
    AND c.subject = old_contacts.subject 
    AND c.created_at = old_contacts.created_at
);

-- 6. Migrate FAQs Data
INSERT INTO faqs (question_en, answer_en, question_fa, answer_fa, created_at, updated_at)
SELECT 
    question_en,
    answer_en,
    question_fa,
    answer_fa,
    created_at,
    updated_at
FROM old_faqs
WHERE question_en NOT IN (SELECT question_en FROM faqs);

-- 7. Migrate Infoes Data
INSERT INTO infoes (title_en, title_fa, body_en, body_fa, image, created_at, updated_at)
SELECT 
    title_en,
    title_fa,
    body_en,
    body_fa,
    image,
    created_at,
    updated_at
FROM old_infoes
WHERE title_en NOT IN (SELECT title_en FROM infoes);

-- 8. Migrate What Do We Data
INSERT INTO what_do_we (title_en, title_fa, slug, description_en, description_fa, body_en, body_fa, created_at, updated_at)
SELECT 
    title_en,
    title_fa,
    slug,
    description_en,
    description_fa,
    body_en,
    body_fa,
    created_at,
    updated_at
FROM old_what_do_we
WHERE slug NOT IN (SELECT slug FROM what_do_we WHERE slug IS NOT NULL);

-- 9. Migrate About Us Data
INSERT INTO about_us (image, body_en, body_fa, created_at, updated_at)
SELECT 
    image,
    body_en,
    body_fa,
    created_at,
    updated_at
FROM old_about_us
WHERE NOT EXISTS (SELECT 1 FROM about_us);

-- ==============================================
-- DATA VALIDATION QUERIES
-- ==============================================

-- Check record counts
SELECT 'users' as table_name, COUNT(*) as record_count FROM users
UNION ALL
SELECT 'states', COUNT(*) FROM states
UNION ALL
SELECT 'categories', COUNT(*) FROM categories
UNION ALL
SELECT 'blogs', COUNT(*) FROM blogs
UNION ALL
SELECT 'contacts', COUNT(*) FROM contacts
UNION ALL
SELECT 'faqs', COUNT(*) FROM faqs
UNION ALL
SELECT 'infoes', COUNT(*) FROM infoes
UNION ALL
SELECT 'what_do_we', COUNT(*) FROM what_do_we
UNION ALL
SELECT 'about_us', COUNT(*) FROM about_us;

-- Check for data integrity issues
SELECT 'Duplicate emails in users' as check_name, COUNT(*) as count FROM (
    SELECT email, COUNT(*) FROM users GROUP BY email HAVING COUNT(*) > 1
) duplicates
UNION ALL
SELECT 'Duplicate slugs in blogs', COUNT(*) FROM (
    SELECT slug, COUNT(*) FROM blogs GROUP BY slug HAVING COUNT(*) > 1
) duplicates
UNION ALL
SELECT 'Orphaned contacts', COUNT(*) FROM contacts c 
LEFT JOIN states s ON c.state_id = s.id 
WHERE s.id IS NULL;

-- ==============================================
-- CLEANUP COMMANDS (Execute AFTER verification)
-- ==============================================

-- Drop old tables after successful migration (UNCOMMENT WHEN READY)
-- DROP TABLE IF EXISTS old_users CASCADE;
-- DROP TABLE IF EXISTS old_states CASCADE;
-- DROP TABLE IF EXISTS old_categories CASCADE;
-- DROP TABLE IF EXISTS old_blogs CASCADE;
-- DROP TABLE IF EXISTS old_contacts CASCADE;
-- DROP TABLE IF EXISTS old_faqs CASCADE;
-- DROP TABLE IF EXISTS old_infoes CASCADE;
-- DROP TABLE IF EXISTS old_what_do_we CASCADE;
-- DROP TABLE IF EXISTS old_about_us CASCADE;

-- ==============================================
-- ROLLBACK COMMANDS (Emergency use only)
-- ==============================================

-- To rollback data migration (if needed)
-- DELETE FROM about_us;
-- DELETE FROM what_do_we;
-- DELETE FROM infoes;
-- DELETE FROM faqs;
-- DELETE FROM contacts;
-- DELETE FROM blogs;
-- DELETE FROM categories;
-- DELETE FROM states;
-- DELETE FROM users WHERE email != 'admin@admin.com';
