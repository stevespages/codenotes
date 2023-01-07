Versioning
==========

*Major.Minor.Patch* versioning is used.

When a new version is to be released the following steps need to be taken.

- Make sure you are working on the *main* branch of the project.

- In README.md put the new version in the main header at the top of the file eg **MyProject v1.4.2**.

- At the bottom of README.md have a *Release Note* explaining what is new about the release.

- Make sure any new functionality is explained and that it is clear how to use it in README.md.

- Comment out all PHP error reporting (The version tagged code is for production).

- Do a final commit and mention that it is the final commit before (for example) Release v1.4.2.

- Run ``git tag -a v1.4.2 -m "Release v1.4.2"``

- Run ``git push origin v1.2.0``.

- Check on GitHub that the new version appears in the *Tags* section for the project.
