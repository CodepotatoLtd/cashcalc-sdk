# Codepotato SDK Template
This template repository has been created to help you write SDKs easily. 

## Getting Started
1. Create a new repository and make sure to select this template
2. Clone the repository locally
3. Run the "php configure.php" locally to run through the setup
4. Start building!

## How to build SDKs
We like to separate our SDKs into "services". In the base SDK.php class you have created for the
project, you can define these services. Once you have defined the service, you can magically access
then with property access. Like this:

```php
<?php

$sdk->service->all();
```
