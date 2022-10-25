SSH
===

SSH allows two computers to pass encrypted information to each other over a network which would not be secure if encryption was not used. The encryption used for exchanging the information is symmetric. However, in order to initiate the SSH connection, asymetric encryption is used to authenticate the computers to each other and to exchange the symetric key that will be used for the subsequent encryption of information.  In normal circumstances the administrator of a client or server computer will only need to get involved with the authentication procedure which involves the correct generation and configuration of the asymetric keys (private and public) on the client and server computer.

Generating an asymetric key pair is commonly done with the `ssh-keygen` command. This results in the creation of a one file with the private key in it and another file with the public key in it. The configuration step involves making sure these files are correctly named, have the correct permissions and are in the correct locations on the client and server file systems. There is also a requirement to copy data from the public key file and paste it into another file. This will be explained below

Symetric Encryption
-------------------
One is called a private key and the other a public key. Data encrypted with the public key can be decrypted using the private key. If a key pair is generated on a computer, the private key can be kept on that computer alone. The public key can be distributed widely to other computers. These can encrypt data with that public key and send the encrypted data back to the original computer which can decrypt the data with the private key. Removing the need to transfer the key used for decryption to other computers is an important advantage for security as transferring the key would constitute a risk that the key might be obtained by a third party.

Asymetric Encryption
--------------------

A public and private key are generated which have the following properties:

- The private key can decrypt messages encrypted by the public key.

- The private key can not be derived from the public key

- The public key can not decrypt messages encrypted by itself or by the private key.

SSH authentication
------------------

This is the process that computer administrators need to engage with in order to be able to set up SSH communication between pairs of computers. An asymetric key pair is generated on the client computer. The private key remains on the client computer. The public key is placed in a file called `authorized_keys` within the `~/.ssh` directory on the server.

When the client requests the server to set up an SSH connection, the server recieves the identity of the client making the request and uses the public key corresponding to this identity in its `authorized_keys` file to encrypt a challenge message which it sends to the client. If the the client can respond to this in a manner which indicates it has decrypted the challenge message then the server considers the client as authenticated.

 

Notes
-----

- private file may not have a file extension (even if a specific format like PEM has been specified). Rename this to blah.pem for FileZilla to be able to import it into 'Site Manager'

- the server will have the public keys of any clients it is configured to use SSH with. It also has an asymetric key pair that it generated. The public key of this pair is sent to a client on the first occassion the client requests an SSH session with that server. Clients will therefore have a list of public keys of servers they have requested SSH connection with previously. This enables clients to know on subsequent connections if they are connecting to the server they intended to. 

Resources
---------

https://www.digitalocean.com/community/tutorials/understanding-the-ssh-encryption-and-connection-process
