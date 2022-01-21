import {
  WAConnection,
  ReconnectMode,
  waChatKey,
  MessageType,
} from "@adiwajshing/baileys";
import * as fs from "fs";
import express = require("express");

const app = express();
app.use(express.json());
const port = 8080;
let data = {};
app.post("/", async (req, res) => {
  res.send("The sedulous hyena ate the antelope!");
  data = req.body;
  console.log(data);
  await example();
});

app.listen(port, (err) => {
  if (err) {
    return console.error(err);
  }
  return console.log(`server is listening on ${port}`);
});

async function example() {
  const conn = new WAConnection(); // instantiate
  conn.autoReconnect = ReconnectMode.onConnectionLost; // only automatically reconnect when the connection breaks
  // conn.logger.level = 'debug' // set to 'debug' to see what kind of stuff you can implement
  // attempt to reconnect at most 10 times in a row
  conn.connectOptions.maxRetries = 10;
  conn.chatOrderingKey = waChatKey(true); // order chats such that pinned chats are on top

  // loads the auth file credentials if present
  /*  Note: one can take this auth_info.json file and login again from any computer without having to scan the QR code, 
        and get full access to one's WhatsApp. Despite the convenience, be careful with this file */
  fs.existsSync("./auth_info.json") && conn.loadAuthInfo("./auth_info.json");
  // uncomment the following line to proxy the connection; some random proxy I got off of: https://proxyscrape.com/free-proxy-list
  //conn.connectOptions.agent = ProxyAgent ('http://1.0.180.120:8080')
  await conn.connect();
  // credentials are updated on every connect
  const authInfo = conn.base64EncodedAuthInfo(); // get all the auth info we need to restore this session
  fs.writeFileSync("./auth_info.json", JSON.stringify(authInfo, null, "\t")); // save this info to a file

  let content = "";
  if (data && Object.keys(data).length !== 0 && data['records'].length > 0) {
    content = `${data["worksheet"]}\n\n`;
    for (let record of data["records"]) {
      for (let key in record)
        content += `${key}: ${record[key]}\n`;
      content += "\n";
    }
    let type = MessageType.text;
    const response = await conn.sendMessage(
      "120363022777054460@g.us",
      content,
      type
    );
    console.log("sent message with ID '" + response.key.id + "' successfully");
  }
}
example().catch((err) => console.log(`encountered error: ${err}`));
