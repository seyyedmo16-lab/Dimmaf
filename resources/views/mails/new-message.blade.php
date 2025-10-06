<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 8px 8px;
        }
        .message-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
            margin: 20px 0;
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: bold;
            width: 120px;
            color: #555;
        }
        .info-value {
            flex: 1;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 14px;
        }
        .badge {
            display: inline-block;
            padding: 4px 8px;
            background: #667eea;
            color: white;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>📧 New Contact Message</h1>
        <p>DIMMAF Immigration Services</p>
    </div>
    
    <div class="content">
        <h2>Message Details</h2>
        
        <div class="message-box">
            <div class="info-row">
                <div class="info-label">From:</div>
                <div class="info-value">{{ $contact->name }} ({{ $contact->email }})</div>
            </div>
            
            <div class="info-row">
                <div class="info-label">Subject:</div>
                <div class="info-value">
                    <span class="badge">{{ $contact->subject }}</span>
                </div>
            </div>
            
            @if($contact->state)
            <div class="info-row">
                <div class="info-label">Province:</div>
                <div class="info-value">{{ $contact->state->name }}</div>
            </div>
            @endif
            
            <div class="info-row">
                <div class="info-label">Date:</div>
                <div class="info-value">{{ $contact->created_at->format('M d, Y H:i') }}</div>
            </div>
        </div>
        
        <h3>Message Content:</h3>
        <div class="message-box">
            <p style="white-space: pre-wrap; margin: 0;">{{ $contact->message }}</p>
        </div>
        
        <div style="margin-top: 30px; text-align: center;">
            <a href="{{ url('/admin/contact') }}" 
               style="background: #667eea; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; display: inline-block;">
                View in Admin Panel
            </a>
        </div>
    </div>
    
    <div class="footer">
        <p>This message was sent from the DIMMAF website contact form.</p>
        <p>Please respond to the customer at: <strong>{{ $contact->email }}</strong></p>
    </div>
</body>
</html>
