# CSV_importer
Parse and import CSV file to database with password protection. Export to HTML file.

## Feature

### File import

**[OK]** - import CSV file into database with UTF-8 charset

#### Issue-001: Not empty CSV file

**[OK]** - check if it is CSV file <br />
**[OK]** - check if it is not empty <br />
**[OK]** - render alert when user try to upload non CSV file or no file

#### Issue-002: File size

**[OK]** - check if file is up to 2 mB

#### Issue-003: Encoding Problem 
CSV file could not be in UTF-8 charset

**[OK]** - check file encoding <br />
**[OK]** - if it is not UTF-8 then decode to UTF-8

#### Issue-004: Only chosen columns
CSV file has many columns, but we do not need all

**[OK]** - select columns that we need

#### Issue-005: Only rows with not zero amount

**[OK]** - check if amount is above zero

#### Issue-006: Checking for transaction duplicity

**[OK]** - hashed transaction number column <br />
**[OK]** - check if there is no duplicate in file

#### Issue-007: Is import done?

**[OK]** - check if import succeed <br />
**[OK]** - error handling

#### Issue-008: Password protection

**[OK]** - password is a must <br />
**[OK]** - render alert when user try to upload CSV file without input or incorrect password

### Redirect to Output

**[OK]** - render data in HTML table <br />
**[OK]** - check if there are any data <br />
**[OK]** - render warning if there are no data

### Data View

#### Issue-009: Password protection

**[OK]** - password is a must <br />
**[OK]** - no data view without input password

#### Issue-010: Empty table

**[OK]** - render warning if there are no data

