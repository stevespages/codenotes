Clone a GitHub Project
======================

If a project is public anyone can clone it (I think). If it is private you need credentials for example an *Personal Access Token*.

We can get the HTTPS link from the project's GitHub page. For example: *https://github.com/stevespages/trees.git* and then, in the directory you want the project to be inside,  run the command: ``git clone https://github.com/stevespages/trees.git``. Provide the name of the GitHub user for the repository and the *Personal Access Token*.

If there is a version of the project on a website and you are not sure if it is identical to the version that has just been cloned from GitHub you can download the project from the server into a different directory than the cloned version of the project and then run diff on the two directories. It makes sense to leave out database files and images if these are not being tracked by git or anything else that is not expected to be identical to the cloned version. An example of running this command is ``$ diff -qr trees trees-from-aws/``. The ``-q`` option supresses any output for identical files. The ``-r`` option makes `dif` read subdirectories. Once this has been completed there is no need to keep the version of the project downloaded from the server.
