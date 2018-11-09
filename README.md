# magento-articles test
A custom Magento 1.9 module for creating articles from the backend.
Frontend article display. CRUD operations for articles in the admin panel.


Build the project:

`sh build`


Start the project when the containers are built:

`sh start`


Stop the containers:

`sh stop`

Remove the project containers and app image (not pulled images):

`sh remove`


### Module code only

The resulting module code is in the `module` folder. 
It is mounted into the corresponding folders during the container build.

### Demo

![demo](https://raw.githubusercontent.com/sr9yar/magento-articles/master/demo.gif "Demo")