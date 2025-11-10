# Contributing to VitaNote

First off, thank you for considering contributing to VitaNote! It's people like you that make VitaNote such a great tool.

## Code of Conduct

This project and everyone participating in it is governed by our Code of Conduct. By participating, you are expected to uphold this code.

## How Can I Contribute?

### Reporting Bugs

Before creating bug reports, please check the issue list as you might find out that you don't need to create one. When you are creating a bug report, please include as many details as possible:

* **Use a clear and descriptive title** for the issue to identify the problem.
* **Describe the exact steps which reproduce the problem** in as many details as possible.
* **Provide specific examples to demonstrate the steps**.
* **Describe the behavior you observed after following the steps** and point out what exactly is the problem with that behavior.
* **Explain which behavior you expected to see instead and why.**
* **Include screenshots and animated GIFs** if possible.

### Suggesting Enhancements

Enhancement suggestions are tracked as GitHub issues. When you are creating an enhancement suggestion, please include:

* **Use a clear and descriptive title** for the issue to identify the suggestion.
* **Provide a step-by-step description of the suggested enhancement** in as many details as possible.
* **Provide specific examples to demonstrate the steps** or provide mockups.
* **Describe the current behavior** and **explain which behavior you expected to see instead** and why.
* **Explain why this enhancement would be useful** to most VitaNote users.

### Pull Requests

* Fill in the required template
* Do not include issue numbers in the PR title
* Follow the Laravel and PHP coding standards
* Include thoughtfully-worded, well-structured tests
* Document new code based on the Documentation Styleguide
* End all files with a newline

## Development Process

### Setting Up Development Environment

1. Fork the repo and clone it to your local machine
2. Install dependencies:
   ```bash
   composer install
   npm install
   ```
3. Copy `.env.example` to `.env` and configure your database
4. Generate application key:
   ```bash
   php artisan key:generate
   ```
5. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```
6. Compile assets:
   ```bash
   npm run dev
   ```

### Coding Standards

* Follow [PSR-12](https://www.php-fig.org/psr/psr-12/) coding standards
* Use Laravel best practices
* Write meaningful commit messages
* Comment your code when necessary
* Use type hints where appropriate
* Write tests for new features

### Testing

```bash
# Run PHP tests
php artisan test

# Run with coverage
php artisan test --coverage
```

### Commit Messages

* Use the present tense ("Add feature" not "Added feature")
* Use the imperative mood ("Move cursor to..." not "Moves cursor to...")
* Limit the first line to 72 characters or less
* Reference issues and pull requests liberally after the first line

Example:
```
Add vitamin references feature

- Add references field to vitamins table
- Create repeater component for references
- Update vitamin detail view
- Add tests for references functionality

Fixes #123
```

### Branch Naming

* `feature/` for new features
* `bugfix/` for bug fixes
* `hotfix/` for urgent fixes
* `refactor/` for code refactoring
* `docs/` for documentation updates

Example: `feature/add-vitamin-references`

## Project Structure

```
app/
├── Console/         # Artisan commands
├── Filament/        # Filament admin resources
│   ├── Pages/       # Custom admin pages
│   └── Resources/   # Model resources
├── Http/
│   └── Controllers/ # Web controllers
├── Models/          # Eloquent models
└── Policies/        # Authorization policies

resources/
├── css/             # Stylesheets
├── js/              # JavaScript files
└── views/           # Blade templates

database/
├── migrations/      # Database migrations
└── seeders/         # Database seeders
```

## Style Guide

### PHP

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vitamin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
     * Get the category that owns the vitamin.
     */
    public function category()
    {
        return $this->belongsTo(VitaminCategory::class, 'vitamin_category_id');
    }
}
```

### Blade

```blade
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-4">
        {{ $vitamin->name }}
    </h1>
    
    @if($vitamin->description)
        <p class="text-gray-600">
            {{ $vitamin->description }}
        </p>
    @endif
</div>
```

### JavaScript

```javascript
// Use modern ES6+ syntax
const vitamins = await fetchVitamins();

vitamins.forEach(vitamin => {
    console.log(vitamin.name);
});
```

## Documentation

* Update README.md if you change functionality
* Update CHANGELOG.md following [Keep a Changelog](https://keepachangelog.com/) format
* Add PHPDoc comments to classes and methods
* Update relevant guides in the docs/ folder

## Questions?

Feel free to open an issue with your question or contact the maintainers directly.

Thank you for contributing! 🎉
