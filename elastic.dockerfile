FROM docker.elastic.co/elasticsearch/elasticsearch:6.2.4

ADD jvm.options /usr/share/elasticsearch/config/

USER root
RUN chown elasticsearch:elasticsearch config/jvm.options

USER elasticsearch
EXPOSE 9200 9300
