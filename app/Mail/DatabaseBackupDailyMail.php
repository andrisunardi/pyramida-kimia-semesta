<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DatabaseBackupDailyMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct() {}

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS'), env('APP_NAME')),
            subject: 'Database Backup Daily - '.now()->isoFormat('dddd, DD MMMM YYYY'),
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.database-backup-daily',
        );
    }

    public function attachments(): array
    {
        $date = now()->today()->toDateString();

        return [
            // Attachment::fromPath(storage_path("app/private/database/{$date}.sql").'/app/database/'.$date.'.sql'),
            Attachment::fromStorage("database/{$date}.sql")
                ->as("database/{$date}.sql")
                ->withMime('application/gzip'),
        ];
    }
}
