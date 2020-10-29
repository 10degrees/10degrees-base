## Current commands

`wp make:cpt`        - generate a custom post type class  
`wp make:model`      - generate a model class  
`wp make:controller` - generate a controller class  
`wp make:command`    - generate a command  

## Ideas for commands

`wp db:migrate`      - run through files in database directory and run each script  
`wp make:block`      - generate a block registration and block partial  
`wp make:job`        - generate a job file  
`wp make:event`      - generate an event class  
`wp make:listener`   - generate an event listener class  
`wp make:middleware` - generate a middleware class  
`wp make:migration`  - generate a migration script in the database directory  
`wp make:shortcode`  - generate a shortcode registration script  
`wp make:subscriber` - generate an event subscriber class  

## Directory structure

```
.
├── app/
│   ├── ACF_Blocks/
│   ├── ACF_Fields/
│   ├── Admin/
│   ├── Boot/
│   ├── Config/
│   ├── Controllers/
│   ├── Cpt/
│   ├── Helpers/
│   ├── Inc/
│   ├── Jobs/
│   ├── Mailer/
│   ├── Migrations/
│   ├── Models/
│   ├── Providers/
│   ├── Services/
│   ├── Shortcodes/
│   ├── Traits/
│   └── Walkers/
├── dist/
├── lang/
├── partials/
├── src/
├── templates/
└── index.php
```
