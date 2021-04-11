# Start RabbitMQ docker container to use with this application

```
docker run -d --hostname my-rabbit --name some-rabbit-management -p 15672:15672 -p 5672:5672 rabbitmq:3-management
```

# Admin for RabbitMQ

[http://localhost:15672](http://localhost:15672)


# Testing scenario

## In first terminal:

```
bin/console messenger:consume async_raw
```

## In second terminal:

```
bin/console messenger:consume async_slug
```

## In third terminal:

```
bin/console app:send-raw "The brown fox jumps a lot"
```

The result is that a message with raw text is first sent via the async_raw transport, by the app:send-raw, and then 
taken by command run in first terminal and passed to the handler which prepares another message and sends it via 
async_slug transport, then received by command in second terminal which displays the slug variant of the raw text.


