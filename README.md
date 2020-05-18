# Exporter_csv
Parse and import CSV file to database with password protection. Export to HTML file.

## Feature

### File import

**[OK]** - import CSV file into database with UTF-8 charset

#### Issue-001: Not empty CSV file

**[OK]** - check if it is CSV file
**[OK]** - check if it is not empty
**[OK]** - render alert when user try to upload non CSV file or no file

#### Issue-002: Encoding Problem 
CSV file could not be in UTF-8 charset

**[OK]** - check file encoding
**[OK]** - if it is not UTF-8 then decode to UTF-8

#### Issue-003: Only chosen columns
CSV file have many columns, but we do not need all

**[OK]** - select columns that we need

#### Issue-004: Only rows with not zero amount

**[OK]** - check if amount is above zero

#### Issue-005: Is import done?

**[OK]** - check if import succeed
**[OK]** - error handling

#### Issue-006: Password protection

**[OK]** - password is a must
**[OK]** - render alert when user try to upload CSV file without input or incorrect password

### Redirect to Output

**[OK]** - render data in HTML table
**[OK]** - check if there are any data
**[OK]** - render warning if there are no data

#### Data View

#### Issue-007: Password protection

**[OK]** - password is a must
**[OK]** - no data view without input password

#### Issue-008: Empty table

**[OK]** - render warning if there are no data

