# Symfony training

This is a fork form [Symfony-docker](https://github.com/dunglas/symfony-docker) by [Kevin Dunglas](https://github.com/dunglas). 

It is use as a base teach the basics of symfony.

The project evolves through git branches:

You should start from the branch `1_defaultController_annotation`

## Branches

#### `1_defaultController_annotation`

Your first controller and the Annotation bundle

#### `2_csaguzzle_chuckNorris`

Add the ChuckNorris Quote Api and endpoints to communicate with it

#### `3_debugComponent`

Add the debug flex recipe :`dump()`, logs, exceptions, stack trace...

#### `4_controller_twig`

Add some endpoints related to ChuckNorris Api  
Add Twig component to render views from controllers

#### `5_form_validation`

Add the Form component to store data in the session  
Add form validation  
Add Mailer component to share your favorites quotes  
Add Mailhog (mail catcher).
Add Bootstrap

#### `6_translations`

Add the translation component and use it in the views

## Getting Started

1. Run `docker-compose up` (the logs will be displayed in the current shell)
2. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
3. **Enjoy!**

### Editing Permissions on Linux

If you work on linux and cannot edit some of the project files right after the first installation, you can run `docker-compose run --rm php chown -R $(id -u):$(id -g) .` to set yourself as owner of the project files that were created by the docker container.

## Credits

Created by [Kévin Dunglas](https://dunglas.fr), co-maintained by [Maxime Helias](https://twitter.com/maxhelias) and sponsored by [Les-Tilleuls.coop](https://les-tilleuls.coop).

