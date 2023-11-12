# PestDocs Bot

This bot let you ask questions answer based on the current Pest docs.

## Idea / Basics

The idea is to have a bot for the Pest docs, providing answers based on the current docs and not based on the old knowledge OpenAI has.

The application consists of 4 commands. Every step has to be done manually as a demonstration purpose.
In a real world scenario the result of the each step should be stored permanently and automatically reused in the other steps.

Uploading the files and creating the assistant is only required once.
Creating a thread and running it can be done multiple times using the same assistant.

## Installation

```bash
composer install
```

### .env
Add your OpenAI Key to the .env file

## Usage

### Upload Docs
First you have to upload a fresh copy of the docs to your OpenAI account.

```bash
php artisan upload-docs
```

As a result you will the file id.

### Create assistant

Provide the file id from the previous step to create a new assistant.

```bash
php artisan create-assistant file-***
```

As a result you will the assistant id.

### Ask a question

Create and run a thread. Provide the assistant id from the previous step to ask a question.

```bash
php artisan create-and-run-thread asst_*** "How can I conditionally test for exceptions?"
```

### Get the result

Get the result by providing the Thread id and Run id from the previous step.

```bash
php artisan get-run-result thread_*** run_***
```

As output you should get something like that:

You can conditionally test for exceptions in Pest using the `throwsIf()` and `throwsUnless()` methods. The `throwsIf()` method allows you to specify that an exception should be thrown only if a given boolean expression evaluates to true, whereas `throwsUnless()` asserts that an exception should be thrown unless a given boolean expression evaluates to false.

Here is an example of using `throwsIf()`:

```php
it('throws exception', function () {
    // Your test code here
})->throwsIf(fn() => DB::getDriverName() === 'mysql', Exception::class, 'MySQL is not supported.');
```

And here is an example of using `throwsUnless()`:

```php
it('throws exception', function () {
    // Your test code here
})->throwsUnless(fn() => DB::getDriverName() === 'mysql', Exception::class, 'Only MySQL is supported.');
```

These methods are helpful when you want the test to assert exceptions based on certain conditions within your application's environment or logic.
