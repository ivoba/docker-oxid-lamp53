FROM ubuntu:12.04
MAINTAINER Ivo Bathke

#RUN echo "deb http://archive.ubuntu.com/ubuntu precise main universe" > /etc/apt/sources.list
RUN apt-get update
RUN apt-get upgrade -y

RUN apt-get install -y nano apache2 php5 php5-cli libapache2-mod-php5 php5-gd php5-json php5-mysql

ADD apache_default /etc/apache2/sites-available/default

ADD ./ioncube/ioncube_loader_lin_5.3.so /usr/lib/php5/20090626/ioncube/ioncube_loader_lin_5.3.so
ADD ./ioncube/02_ioncube.ini /etc/php5/apache2/conf.d/02_ioncube.ini
ADD ./zendguardloader/php-5.3.x/ZendGuardLoader.so /usr/lib/php5/20090626/ZendGuardLoader.so
ADD ./zendguardloader/03_zendguardloader.ini /etc/php5/apache2/conf.d/03_zendguardloader.ini

RUN a2enmod php5
RUN a2enmod rewrite
RUN sed -ri 's/^display_errors\s*=\s*Off/display_errors = On/g' /etc/php5/apache2/php.ini
RUN sed -ri 's/^display_errors\s*=\s*Off/display_errors = On/g' /etc/php5/cli/php.ini
RUN sed -ri 's/^error_reporting\s*=.*$/error_reporting = E_ALL \& ~E_DEPRECATED \& ~E_NOTICE/g' /etc/php5/apache2/php.ini
RUN sed -ri 's/^error_reporting\s*=.*$/error_reporting = E_ALL \& ~E_DEPRECATED \& ~E_NOTICE/g' /etc/php5/cli/php.ini


ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data

EXPOSE 80
CMD /usr/sbin/apache2ctl -D FOREGROUND
