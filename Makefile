MAINTAINER = "CS50 <sysadmins@cs50.harvard.edu>"
NAME = adminer50
VERSION = 1.0.1

.PHONY: clean
clean:
	rm -rf opt $(NAME)_$(VERSION)_*.deb

.PHONY: deb
deb: clean
	mkdir -p opt/cs50/adminer
	cp -r adminer-4.3.1.php bin css fonts images index.php Makefile plugins opt/cs50/adminer
	chmod -R a+rX opt
	chmod -R a+x opt/cs50/adminer/bin/*
	fpm \
	-m $(MAINTAINER) \
	-n $(NAME) \
	-s dir \
	-t deb \
	-v $(VERSION) \
	--after-install postinst \
	--deb-no-default-config-files \
	--depends coreutils \
	--depends curl \
	--depends mktemp \
	--depends php5-cli \
	opt
