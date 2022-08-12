# Notes

## Run composer commands on disposable Docker container

```shell
docker run --rm --interactive --tty --volume $PWD:/app composer
```