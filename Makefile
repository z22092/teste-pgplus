NAME = $(shell git ls-remote --get-url | cut -d ':'  -f2 | cut -d '.' -f -1)
DOCKER_IMAGE = registry.gitlab.com/$(NAME)
BRANCH = $(shell git symbolic-ref --short HEAD)


build: ;
	docker build --cache-from $(DOCKER_IMAGE):latest --tag $(DOCKER_IMAGE):	 --tag $(DOCKER_IMAGE):latest .;

push: ;
	docker push $(DOCKER_IMAGE):$(VERSION);
	docker push $(DOCKER_IMAGE):latest;

echo:
	echo -e $(DOCKER_IMAGE)
	echo -e $(BRANCH)
	
run:
	docker run --env NODE_ENV=development  -p 127.0.0.1:7001:7001 $(DOCKER_IMAGE):$(VERSION)

rundev:
	eval $$(npm run dev  --quiet  --prefix ~/codes/bus/conversation/pgmais-2018-005/master/)
	eval $$(npm run dev  --quiet  --prefix ~/codes/bus/conversation/pg018-consulta-cliente/master/)


init:
	docker-compose up

run: 
	docker run -it php bash