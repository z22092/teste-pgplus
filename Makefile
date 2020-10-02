NAME = $(shell git ls-remote --get-url | cut -d '/'  -f 5 | cut -d "." -f -1)
BRANCH = $(shell git symbolic-ref --short HEAD)
VERSION = $(shell git describe --abbrev=0 --tags)

.PHONY : build-docker-image start-docker-compose update-var-dot-env build-docker-image bash push open-url
.PHONY : gen-npm-install run

build-docker-image: 
	 @docker-compose up --build -d;

start-docker-compose:
	 @docker-compose up -d;

update-var-dot-env:
	 @sed 's/$(shell cat .env | grep APPNAME | cut -d '=' -f 2)/$(NAME)/g' .env > .env2;
	 @sed 's/$(shell cat .env | grep TAG | cut -d '=' -f 2)/$(BRANCH)-$(VERSION)/g' .env2 > .env;
	 @rm .env2

open-url:
	@xdg-open http:\\localhost:8080

bash: 
	@docker run -it $(NAME):$(BRANCH)-$(VERSION) bash;

down: 
	@docker-compose down;	

logs:
	@docker logs $(NAME)

build: build-docker-image update-var-dot-env
up: start-docker-compose update-var-dot-env open-url