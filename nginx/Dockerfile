FROM nginx:latest

RUN apt-get update && apt-get install -y --no-install-recommends apt-utils


RUN apt-get install -y apt-utils curl wget git nano gnupg2

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash - && apt-get install -y nodejs npm


# obtaining ssl certifacates
# RUN wget https://github.com/kshcherban/acme-nginx/releases/download/v0.1.2/acme-nginx
# RUN chmod +x acme-nginx
# RUN ./acme-nginx -d dev.jvzoo-academy.com --virtual-host ./etc/nginx/conf.d/customvhost


WORKDIR /usr/share/nginx
