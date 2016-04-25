# Battleship #

A Symfony project created on March 11, 2016, 2:05 am.

## Overview ##

This repository holds a [battleship game](https://en.wikipedia.org/wiki/Battleship_%28game%29) written in PHP Symfony. **It's not finished** but the overall logic and entities are there. The BattleshipBundle contains the views, controllers and entity repositories.

## The ships ##

Each ship contains a length:

* AircraftCarrier (5)
* Battleship (4)
* Cruiser (3)
* Destroyer (2)
* Submarine (2)

## The game ##

This project is not supposed to have a login, only a 2 users game play using different urls like: /game/player1 and /game/player2. Simple UI with Ajax calls on every move.

## The Classes ##

Here are the entities:

* **The Board**: Where all the ships are and the shots happen.
* **The Game**: It holds the players, it's boards and it's shots. It also has a flag for whose turn it is. Lastly, it has a winner of type Player.
* **A Player**: Stores only a name
* **The Shots** (moves) Contains x and y positions, and a reference to the board.
* **A Ship**: the base class for all the other ships