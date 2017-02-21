# Rock Paper Scissors Game
# [Live Site](https://extreme-rps.herokuapp.com/)

#### _A webpage that allows two players to play Rock, Paper, Scissors, 15 February 2017_

#### By _**Erica Wright & Matt Kelley**_

## Description

This webpage will allow two users to play the Extreme version of Rock, Paper, Scissors and display the winner.

## Setup/Installation Requirements

1. _Fork and clone this repository from_ [gitHub]https://github.com/ericaw21/rockpaperscissors.git.
2. Run `composer install --prefer-source --no-interaction` from project root
3. Create a local server in the /web directory within the project folder using the command: `php -S localhost:8000`
4. Open the directory http://localhost:8000/ in any standard web browser.

* Or open [Live Site](https://extreme-rps.herokuapp.com/)

## Specifications

|Behavior|Input|Output|
|--------|-----|------|
| User selects single game and presses "Play!" | "Single" | Single Player UI is displayed |
| Users enter an option | User: "Rock" | "Player 1's Rock beats Computer's Scissors" |
| User selects 2 Player game and presses "Play!" | "2 Player" | Two Player UI is displayed |
| Two users enter an option | User 1: "Rock" User 2: "Scissors" | "Player 1's Rock beats Computer's Scissors"  |
| Two users enter the same option | User 1: "Rock" User 2: "Rock" | "Draw" |
| User presses the clear game button | "Clear Game" | all previous games are wiped and the home screen is displayed |

## Known Bugs

No known bugs.

## Support and contact details

Please contact ericaw21@gmail.com or m_kelley2@yahoo.com with questions or concerns.

## Technologies Used

* _HTML_
* _CSS_
* _Bootstrap_
* _PHP_
* _Silex_
* _Twig_
* _Composer_

## License

*MIT license*

Copyright (c) 2017 {**Erica Wright & Matt Kelley**} All Rights Reserved.
