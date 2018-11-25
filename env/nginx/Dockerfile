FROM nginx:latest

ENV EXECUTE_USER developer
RUN mkdir -p /var/www/app
RUN useradd -m -s /bin/bash -u 1000 ${EXECUTE_USER} && \
#nginx.conf
sed -i "s/user\ \ nginx\;/user\ \ ${EXECUTE_USER}\;/g" /etc/nginx/nginx.conf

ADD ./default.conf /etc/nginx/conf.d/default.conf
WORKDIR /var/www/app