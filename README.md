# Install grpc
``` 
sudo apt-get install php8.2-grpc

```

``` 
sudo apt-get install php8.2-protobuf
```

```
sudo apt  install protobuf-compiler
```
# Install Roadrunner with debian package:

```
$ wget https://github.com/roadrunner-server/roadrunner/releases/download/v2023.1.3/roadrunner-2023.1.3-linux-amd64.deb
$ sudo dpkg -i roadrunner-2023.1.3-linux-amd64.deb
```
You can find another versions in https://github.com/roadrunner-server/roadrunner




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

# Install packages in your Laravel Applications(Servers and Clients Sides Applications):

``` 
composer require google/protobuf
composer require spiral/goridge
composer require spiral/roadrunner
composer require spiral/roadrunner-grpc
```

# Run the server 

``` 
rr  -w ./ serve
```

- You need to run the server just on Server Side Laravel Application.
That run .rr.yaml file as server and watch to this directory to watch files changes 

# Create Required Files 

``` 
 protoc --proto_path=./ --php_out=./ --grpc_out=./  --plugin=protoc-gen-grpc=/usr/local/bin/grpc/grpc_php_plugin service.proto
```
If you do not want to create Client grpc code remove ``--grpc_out`` flag to create code just for server side.like so :

```
 protoc --proto_path=./ --php_out=./  --plugin=protoc-gen-grpc=/usr/local/bin/grpc/grpc_php_plugin service.proto

```

but proto file must be exists in both side(client and server side)
