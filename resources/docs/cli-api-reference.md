---
title: CLI API Reference
description: In the preceding chapters of the Pest documentation, we have covered numerous CLI options that are available in Pest. Nevertheless, Pest provides many other options that could prove beneficial. The complete CLI API Reference is provided below for your convenience.
---

# CLI API Reference

In the preceding chapters of the Pest documentation, we have covered numerous CLI options that are available in Pest. Nevertheless, Pest provides many other options that could prove beneficial. The complete CLI API Reference is provided below for your convenience.

## Configuration

- `--init`: Initialize a standard Pest configuration.
- `-c|--configuration <file>`: Read configuration from XML file.
- `--no-configuration`: Ignore default configuration file (phpunit.xml).
- `--no-extensions`: Do not load PHPUnit extensions.
- `--include-path <path(s)>`: Prepend PHP's include_path with given path(s).
- `-d <key[=value]>`: Set a php.ini value.
- `--cache-directory <dir>`: Specify cache directory.
- `--generate-configuration`: Generate configuration file with suggested settings.
- `--migrate-configuration`: Migrate configuration file to current format.
- `--test-directory`: Specify test directory containing Pest.php, TestCase.php, helpers and your tests. Default: tests

## Selection

- `--bail`: Stop execution upon first not-passed test.
- `--todos`: Output to standard output the list of todos.
- `--retry`: Run non-passing tests first and stop execution upon first error or failure.
- `--exclude-testsuite <name>`: Exclude tests from the specified test suite(s).
- `--list-groups`: List available test groups.
- `--group <name>`: Only run tests from the specified group(s).
- `--exclude-group <name>`: Exclude tests from the specified group(s).
- `--covers <name>`: Only run tests that intend to cover <name>.
- `--uses <name>`: Only run tests that intend to use <name>.
- `--list-tests`: List available tests.
- `--list-tests-xml <file>`: List available tests in XML format.
- `--filter <pattern>`: Filter which tests to run
- `--test-suffix <suffixes>`: Only search for test in files with specified suffix(es). Default: Test.php,.phpt

## Execution

- `--globals-backup`: Backup and restore $GLOBALS for each test.
- `--static-backup`: Backup and restore static properties for each test.
- `--strict-coverage`: Be strict about code coverage metadata.
- `--strict-global-state`: Be strict about changes to global state.
- `--disallow-test-output`: Be strict about output during tests.
- `--enforce-time-limit`: Enforce time limit based on test size.
- `--default-time-limit <sec>`: Timeout in seconds for tests that have no declared size.
- `--dont-report-useless-tests`: Do not report tests that do not test anything.
- `--stop-on-defect`: Stop execution upon first not-passed test.
- `--stop-on-error`: Stop execution upon first error.
- `--stop-on-failure`: Stop execution upon first error or failure.
- `--stop-on-warning`: Stop execution upon first warning.
- `--stop-on-risky`: Stop execution upon first risky test.
- `--stop-on-skipped`: Stop execution upon first skipped test.
- `--stop-on-incomplete`: Stop execution upon first incomplete test.
- `--fail-on-incomplete`: Treat incomplete tests as failures.
- `--fail-on-risky`: Treat risky tests as failures.
- `--fail-on-skipped`: Treat skipped tests as failures.
- `--fail-on-warning`: Treat tests with warnings as failures.
- `--cache-result`: Write test results to cache file.
- `--do-not-cache-result`: Do not write test results to cache file
- `--order-by <order>`: Run tests in order: default|defects|depends|duration|no-depends|random|reverse|size.
- `--random-order-seed <N>`: Use the specified random seed when running tests in random order

## Reporting

- `--colors <flag>`: Use colors in output ("never", "auto" or "always").
- `--columns <n>`: Number of columns to use for progress output.
- `--columns max`: Use maximum number of columns for progress output.
- `--stderr`: Write to STDERR instead of STDOUT.
- `--no-progress`: Disable output of test execution progress.
- `--no-results`: Disable output of test results.
- `--no-output`: Disable all output.
- `--display-incomplete`: Display details for incomplete tests.
- `--display-skipped`: Display details for skipped tests.
- `--display-deprecations`: Display details for deprecations triggered by tests.
- `--display-errors`: Display details for errors triggered by tests.
- `--display-notices`: Display details for notices triggered by tests.
- `--display-warnings`: Display details for warnings triggered by tests.
- `--reverse-list`: Print defects in reverse order.
- `--teamcity`: Replace default progress and result output with TeamCity format.
- `--testdox`: Replace default result output with TestDox format
- `--compact`:  Replace default result output with Compact format

## Logging

- `--log-junit <file>`: Write test results in JUnit XML format to file.
- `--log-teamcity <file>`: Write test results in TeamCity format to file.
- `--testdox-html <file>`: Write test results in TestDox format (HTML) to file.
- `--testdox-text <file>`: Write test results in TestDox format (plain text) to file.
- `--log-events-text <file>`: Stream events as plain text to file.
- `--log-events-verbose-text <file>`: Stream events as plain text (with telemetry information) to file.
- `--no-logging`: Ignore logging configured in the XML configuration file

## Code Coverage

- `--coverage`: Generate code coverage report and output to standard output.
- `--coverage --min=<value>`: Set the minimum required coverage percentage, and fail if not met.
- `--coverage-crap4j <file>`: Write code coverage report in Crap4J XML format to file.
- `--coverage-html <dir>`: Write code coverage report in HTML format to directory.
- `--coverage-php <file>`: Write serialized code coverage data to file.
- `--coverage-text=<file>`: Write code coverage report in text format to file [default: standard output].
- `--coverage-xml <dir>`: Write code coverage report in XML format to directory.
- `--warm-coverage-cache`: Warm static analysis cache.
- `--coverage-filter <dir>`: Include `<dir>`: in code coverage reporting.
- `--path-coverage`: Report path coverage in addition to line coverage.
- `--disable-coverage-ignore`: Disable metadata for ignoring code coverage.
- `--no-coverage`: Ignore code coverage reporting configured in the XML configuration file

## Profiling

- `--profile`: Output to standard output the top ten slowest tests

---

In this chapter, you found a complete list of CLI options provided by Pest. In the subsequent documentation, we will explore the topic of test dependencies: [Test Dependencies](/docs/test-dependencies)
