# Backend Coding Test

Welcome to the Signer project! This Laravel-based application allows users to upload PDF or DOC files, add elements such as text and images to these documents, regenerate the original document with the added elements, and download the modified document. The project also includes features like rate limiting and document viewing.

## Features

-   File Uploader: Users can upload PDF or DOC files.
-   Document Customization: Add text and/or images to specific positions in the document.
-   Regenerate Document: Regenerate the original document with the added elements.
-   Download Document: Option to download the modified document.
-   Rate Limiting: Users are blocked for 20 minutes if they process more than 3 documents within 10 minutes.
-   Document Viewing: Users can view both original and processed documents.

## Prerequisites

-   PHP >= 7.4
-   Composer
-   Laravel >= 8.x
-   MySQL or your preferred database system

## Getting Started

1. Clone the repository:

```bash
git clone https://github.com/your-username/signer.git

```

2. Install the dependencies

```bash
composer install

```
3. Create a .env file by duplicating the .env.example file:

```bash
cp .env.example .env

```
4. Generate the application key:
```bash 
php artisan key:generate

```
5. Configure your database connection in the .env file:
```bash 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

```
6. Run migrations to the database:
```bash 
php artisan migrate

```
7. Start the development server:
```bash 
php artisan serve

```
## Usage Instructions

1. After starting the development server, open your web browser.
2. Access the application by navigating to `http://localhost:8000` in your browser.
3. Register for a new account then log in using that.
4. Upload PDF or DOC files through the file uploader on the dashboard.
5. Customize documents by adding text and/or images to specific positions.
6. Click the "Process Document" button to apply your modifications.
7. Download the modified document from the provided link.
8. Explore the "Document Viewing" section to compare original and processed documents.

## Authors

-   [@shuvo](https://www.github.com/shuvo18103107)
