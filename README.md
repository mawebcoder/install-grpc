# Install grpc
``` 
sudo apt-get install php8.2-grpc

```

``` 
sudo apt-get install php8.2-protobuf
```
# Install Roadrunner with debian package:

```
$ wget https://github.com/roadrunner-server/roadrunner/releases/download/v2023.1.3/roadrunner-2023.1.3-linux-amd64.deb
$ sudo dpkg -i roadrunner-2023.1.3-linux-amd64.deb
```




- you can install these extension with ``pecl`` but you need to enable extensions manually,
but you need to set them in modules-available first


# Clone Grpc repo to install grpc compiler

``` 
$ sudo apt-get update 
$ sudo apt-get install cmake 
$ git clone -b v1.55.0 https://github.com/grpc/grpc
$ cd grpc
$ git submodule update --init
$
$ cmake .
$ make protoc grpc_php_plugin
```

# Install packages in your Laravel Application:

``` 
composer require google/protobu
composer require spiral/goridge
composer require spiral/roadrunner
composer require spiral/roadrunner-grpc
```

# Run the server 

``` 
rr server -w ./ serv
```
That run .rr.yaml file as server and watch to this directory to watch files changes 

# Create Required Files 

``` 
protoc --proto_path=. --php_out=. --grpc_php_out=. --plugin=protoc-gen-grpc-php=/path/to/grpc_php_plugin service.proto
```

