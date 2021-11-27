# Restaurant kitchen realtime ordering software

Online web application developed in PHP using Laravel framework for managing real-time kitchen orders in a restaurant. 
It allows, through a web panel, real-time communication between chefs and waiters about the status of orders. 

Main features:

- System of registration and identification of restaurant workers.
- Three operational roles: 
- Administrator: absolute control over registered worker accounts, active / deactivated account status and account type (administrator, waiter, chef). 
- Waiter: operation on products and stock, taking orders and change of status “Annotate order -> Pending” or “Ready -> Delivered”.
- Chef: operation on change of order status Pending -> Ready and change of product status to “no stock”.
- Real-time notification system using websockets through pop-up windows to notify chefs about new orders or notify waiters when the order is ready in the kitchen.

## Requirements

PHP, MySQL database. Laravel support.

## Screenshots

Admin control panel of workers:

<img src=screenshots/01.jpg width=600>

Admin control panel of categories:

<img src=screenshots/02.jpg width=600>

Waiter control panel of products:

<img src=screenshots/00.jpg width=600>

Waiter creates order, chef recieves realtime popup notification:

<img src=screenshots/03.jpg width=600>

Chef food is ready and changes order status to Done. Waiter recieves realtime popup notification to pick it up:

<img src=screenshots/04.jpg width=600>
<img src=screenshots/05.jpg width=600>

Waiter serves food to table and changes order status to Completed, chef recieves realtime popup notification that food was served to client:

<img src=screenshots/06.jpg width=600>
<img src=screenshots/07.jpg width=600>

## Collaborations

Collaborations to improve app are always welcome.
