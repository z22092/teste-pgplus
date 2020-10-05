
# Test PG Mais

  

Parse a text file, with messages and return a ID and Broker of valid messages;

  

- example of accepted :

663b9f69-6b67-4a5b-bd1a-3266f2ad8a01;85;967009811;VIVO;06:27:38;I'm gonna drink 'til I reboot.

- return exemple:

663b9f69-6b67-4a5b-bd1a-3266f2ad8a01;1

More exemples of [accepted](https://raw.githubusercontent.com/z22092/teste-pgplus/master/_data_/29f650e0-04cc-11eb-9342-fb56f8d6040d.txt) and [return](https://raw.githubusercontent.com/z22092/teste-pgplus/master/_data_/1601656364.txt) 
  

## - How to run -

Requiriments

- - [Docker](https://docs.docker.com/install/)

- - [Docker-Compose](https://docs.docker.com/compose/install/)


There is a Makefile at the root of the project with useful commands; (only linux users)

- make build: build a docker image used to run the system and upload the container instances;

- make up: up as instances of the container without the image build;

- make down: drops the container instances;

- make logs: Shows the container logs;

There is a .env inside the folder that loads some useful settings:

- APPNAME=teste-pgplus

- TAG=master-v0.1

- List item

- ALPINE_VERSION=3.11

- PHP_VERSION=7.4

- HOSTPORT=8080

- DOCKERPORT=8080
 
## *Linux*

1. To run just run the command "make build", wait it finish, and done <br><br>


## *Windows*
  
1. Follow commands

  ```
  docker-compose up --build -d
  ```

2. Then just access the address http://localhost:8080<br><br>

3. Click on de box

![box](https://raw.githubusercontent.com/z22092/teste-pgplus/master/_data_/open.png)<br><br>

4. Upload file and wait finish <br><br>

5. Click to download parsed text file

![finish](https://raw.githubusercontent.com/z22092/teste-pgplus/master/_data_/finish.png)<br><br>

## - Used technologies -


**OS**

- Pop!_OS: 20.04

- Alpine: 3.11 \\\Docker Image

**IDE**

- Visual Studio Code: Latest

  

**Langs Frontend**

- Javascript (frontend)

- HTML (frontend)

- CSS (frontend)

**Langs Backend**

- PHP: 7.4

**DB**

- Redis: Latest

**Libs**

- Symfony/http-client: 5.1

  

**Build**

- Makefile \ Shell script

- Docker \ Docker-compose

  

## - Operation diagram -
  
![sequenceDiagram](https://mermaid.ink/svg/eyJjb2RlIjoic2VxdWVuY2VEaWFncmFtXG4gIEZyb250ZW5kIC0-PiBCYWNrZW5kOiBmaWxlIHVwbG9hZFxuICBCYWNrZW5kIC0tPj4gUGFyc2VyOiAtPlxuICBQYXJzZXIgLS0-PiBjaGVjayBydWxlczogU3BsaXQgcGVyIHNlbWljb2xvblxuICBjaGVjayBydWxlcyAtLT4-IFNhdmUgY2FjaGU6IEZpbHRlciBpbnZhbGlkcyBtZXNzYWdlXG4gIFNhdmUgY2FjaGUgLT4gQ2hlY2sgQmxhY2tsaXN0Oi0-XG4gIENoZWNrIEJsYWNrbGlzdCAtPj4gRnJvbnRlbmQ6IHNlbmRzIGdyYWR1YWxseSB3aGlsZSBhbmQgY2hlY2tpbmcgaXMgZmluaXNoZWRcbk5vdGUgbGVmdCBvZiBTYXZlIGNhY2hlOnNlZSBydWxlc1xuTm90ZSBsZWZ0IG9mIENoZWNrIEJsYWNrbGlzdDpwcm9jZXNzIHN0YXJ0IG9uIDxicj4gcGFyc2VyIGZpbmlzaFxuICAgICAgICAgICAgIiwibWVybWFpZCI6eyJ0aGVtZSI6ImRlZmF1bHQiLCJ0aGVtZVZhcmlhYmxlcyI6eyJiYWNrZ3JvdW5kIjoid2hpdGUiLCJwcmltYXJ5Q29sb3IiOiIjRUNFQ0ZGIiwic2Vjb25kYXJ5Q29sb3IiOiIjZmZmZmRlIiwidGVydGlhcnlDb2xvciI6ImhzbCg4MCwgMTAwJSwgOTYuMjc0NTA5ODAzOSUpIiwicHJpbWFyeUJvcmRlckNvbG9yIjoiaHNsKDI0MCwgNjAlLCA4Ni4yNzQ1MDk4MDM5JSkiLCJzZWNvbmRhcnlCb3JkZXJDb2xvciI6ImhzbCg2MCwgNjAlLCA4My41Mjk0MTE3NjQ3JSkiLCJ0ZXJ0aWFyeUJvcmRlckNvbG9yIjoiaHNsKDgwLCA2MCUsIDg2LjI3NDUwOTgwMzklKSIsInByaW1hcnlUZXh0Q29sb3IiOiIjMTMxMzAwIiwic2Vjb25kYXJ5VGV4dENvbG9yIjoiIzAwMDAyMSIsInRlcnRpYXJ5VGV4dENvbG9yIjoicmdiKDkuNTAwMDAwMDAwMSwgOS41MDAwMDAwMDAxLCA5LjUwMDAwMDAwMDEpIiwibGluZUNvbG9yIjoiIzMzMzMzMyIsInRleHRDb2xvciI6IiMzMzMiLCJtYWluQmtnIjoiI0VDRUNGRiIsInNlY29uZEJrZyI6IiNmZmZmZGUiLCJib3JkZXIxIjoiIzkzNzBEQiIsImJvcmRlcjIiOiIjYWFhYTMzIiwiYXJyb3doZWFkQ29sb3IiOiIjMzMzMzMzIiwiZm9udEZhbWlseSI6IlwidHJlYnVjaGV0IG1zXCIsIHZlcmRhbmEsIGFyaWFsIiwiZm9udFNpemUiOiIxNnB4IiwibGFiZWxCYWNrZ3JvdW5kIjoiI2U4ZThlOCIsIm5vZGVCa2ciOiIjRUNFQ0ZGIiwibm9kZUJvcmRlciI6IiM5MzcwREIiLCJjbHVzdGVyQmtnIjoiI2ZmZmZkZSIsImNsdXN0ZXJCb3JkZXIiOiIjYWFhYTMzIiwiZGVmYXVsdExpbmtDb2xvciI6IiMzMzMzMzMiLCJ0aXRsZUNvbG9yIjoiIzMzMyIsImVkZ2VMYWJlbEJhY2tncm91bmQiOiIjZThlOGU4IiwiYWN0b3JCb3JkZXIiOiJoc2woMjU5LjYyNjE2ODIyNDMsIDU5Ljc3NjUzNjMxMjglLCA4Ny45MDE5NjA3ODQzJSkiLCJhY3RvckJrZyI6IiNFQ0VDRkYiLCJhY3RvclRleHRDb2xvciI6ImJsYWNrIiwiYWN0b3JMaW5lQ29sb3IiOiJncmV5Iiwic2lnbmFsQ29sb3IiOiIjMzMzIiwic2lnbmFsVGV4dENvbG9yIjoiIzMzMyIsImxhYmVsQm94QmtnQ29sb3IiOiIjRUNFQ0ZGIiwibGFiZWxCb3hCb3JkZXJDb2xvciI6ImhzbCgyNTkuNjI2MTY4MjI0MywgNTkuNzc2NTM2MzEyOCUsIDg3LjkwMTk2MDc4NDMlKSIsImxhYmVsVGV4dENvbG9yIjoiYmxhY2siLCJsb29wVGV4dENvbG9yIjoiYmxhY2siLCJub3RlQm9yZGVyQ29sb3IiOiIjYWFhYTMzIiwibm90ZUJrZ0NvbG9yIjoiI2ZmZjVhZCIsIm5vdGVUZXh0Q29sb3IiOiJibGFjayIsImFjdGl2YXRpb25Cb3JkZXJDb2xvciI6IiM2NjYiLCJhY3RpdmF0aW9uQmtnQ29sb3IiOiIjZjRmNGY0Iiwic2VxdWVuY2VOdW1iZXJDb2xvciI6IndoaXRlIiwic2VjdGlvbkJrZ0NvbG9yIjoicmdiYSgxMDIsIDEwMiwgMjU1LCAwLjQ5KSIsImFsdFNlY3Rpb25Ca2dDb2xvciI6IndoaXRlIiwic2VjdGlvbkJrZ0NvbG9yMiI6IiNmZmY0MDAiLCJ0YXNrQm9yZGVyQ29sb3IiOiIjNTM0ZmJjIiwidGFza0JrZ0NvbG9yIjoiIzhhOTBkZCIsInRhc2tUZXh0TGlnaHRDb2xvciI6IndoaXRlIiwidGFza1RleHRDb2xvciI6IndoaXRlIiwidGFza1RleHREYXJrQ29sb3IiOiJibGFjayIsInRhc2tUZXh0T3V0c2lkZUNvbG9yIjoiYmxhY2siLCJ0YXNrVGV4dENsaWNrYWJsZUNvbG9yIjoiIzAwMzE2MyIsImFjdGl2ZVRhc2tCb3JkZXJDb2xvciI6IiM1MzRmYmMiLCJhY3RpdmVUYXNrQmtnQ29sb3IiOiIjYmZjN2ZmIiwiZ3JpZENvbG9yIjoibGlnaHRncmV5IiwiZG9uZVRhc2tCa2dDb2xvciI6ImxpZ2h0Z3JleSIsImRvbmVUYXNrQm9yZGVyQ29sb3IiOiJncmV5IiwiY3JpdEJvcmRlckNvbG9yIjoiI2ZmODg4OCIsImNyaXRCa2dDb2xvciI6InJlZCIsInRvZGF5TGluZUNvbG9yIjoicmVkIiwibGFiZWxDb2xvciI6ImJsYWNrIiwiZXJyb3JCa2dDb2xvciI6IiM1NTIyMjIiLCJlcnJvclRleHRDb2xvciI6IiM1NTIyMjIiLCJjbGFzc1RleHQiOiIjMTMxMzAwIiwiZmlsbFR5cGUwIjoiI0VDRUNGRiIsImZpbGxUeXBlMSI6IiNmZmZmZGUiLCJmaWxsVHlwZTIiOiJoc2woMzA0LCAxMDAlLCA5Ni4yNzQ1MDk4MDM5JSkiLCJmaWxsVHlwZTMiOiJoc2woMTI0LCAxMDAlLCA5My41Mjk0MTE3NjQ3JSkiLCJmaWxsVHlwZTQiOiJoc2woMTc2LCAxMDAlLCA5Ni4yNzQ1MDk4MDM5JSkiLCJmaWxsVHlwZTUiOiJoc2woLTQsIDEwMCUsIDkzLjUyOTQxMTc2NDclKSIsImZpbGxUeXBlNiI6ImhzbCg4LCAxMDAlLCA5Ni4yNzQ1MDk4MDM5JSkiLCJmaWxsVHlwZTciOiJoc2woMTg4LCAxMDAlLCA5My41Mjk0MTE3NjQ3JSkifX0sInVwZGF0ZUVkaXRvciI6ZmFsc2V9)


## - Rules -

  

- Checks if the phone number is a valid Brazilian number

- Checks whether the local phone code (DDD) is a valid code

- Blocked Message by location

- Block messages after 19:59:59

- Maximum number of characters allowed 140

- Check if more than one message is being sent and only send the most recent valid message

  

<br>

  

**Blocked location**

|DDD|REGION|STATE|

|:--|:----------------------|---------:|

|`11`|São Paulo |São Paulo|

|`12`|São José dos Campos |São Paulo|

|`13`|Santos |São Paulo|

|`14`|Bauru |São Paulo|

|`15`|Sorocaba |São Paulo|

|`16`|Ribeirão Preto |São Paulo|

|`17`|São José do Rio Preto |São Paulo|

|`18`|Presidente Prudente |São Paulo|

|`19`|Campinas |São Paulo|

  

<br>

  

**Broker ID**

|ID_BROKER | OPERADORAS|

|--|--|

|1| VIVO, TIM|

|2 |CLARO, OI|

|3 |NEXTEL|

  

<br>

  
  

## Bonus

A dynamic message generator was created following the accepted standard

  

## - How to run -

  

Open the console, go to the "gerador" folder at the project root

And do the commands:

  

$ npm i

for generate file run:

  

$ node index.js $number_of_lines

  

number_of_lines = Number of lines you want to generate;

  

The file that will be generated will be inside the "files" folder

## - Used technologies -

**Langs**

- Node: v12.16.3

**Libs**

- axios: 0.20.0

- moment: 2.29.0

- uuid: 8.3.0

**Quotes**

- Futurama API: http://futuramaapi.herokuapp.com (Bender Characters)

  

<br>

  

# Steps

  

- [x] README

- [x] What was used

- [x] Execution instructions

- [ ] Test instructions 😥

- [ ] Unit test 😥

- [ ] Documents 😥
