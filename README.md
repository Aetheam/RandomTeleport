# RandomTeleport
Teleport randomly

## How to use

Add the plugin to plugins and start your server!

You can customize the command name, aliases, messages, and range in config.yml. The permission for this command is rtp.cmd.

## Config

```yaml
command:
  name: "randomteleport"
  aliases:
    - "rtp"
    - "randomtp"
  description: "Teleport randomly"
  usage_message: "/rtp"

  #permission name is rtp.cmd

messages:
  no_permission: "§cYou don't have the permission to use this command !"
  success: "§aSauccesfully teleported §b{x} §b{y} §b{z}"
  not_player: "§cYou have to be a player to use this command !"

range:
  x: #or [0, 100]
    - 0
    - 100
  z: #or [0, 100]
    - 0
    - 100
```
