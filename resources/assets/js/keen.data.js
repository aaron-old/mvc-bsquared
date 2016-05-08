var client = new Keen({
    projectId: "5713e93fd2eaaa572c3f835a", // String (required always)
    writeKey: "cd0d456d5d57db0ddf857aa6702349af9f6d37bfeb3438a942e8707ad17cc04a9909a1e092fe7ac356aa0a638f02b166ebd6d5a19d136df6b9cd4c10a1d80054eb75af526bb31b1ea5f248a10757e6f20275e994e017ee9f98f59bb6f47a2386",   // String (required for sending data)
    readKey: "9157d65c133ab8fb63afab41f01890c61b3d7089273a9fc60fc6f701cde9c28ac577a4372f2aad1c3c990233fa1e1f784b9090f5d098e3c89ab42921fd8efc703e56585e4fd989450b62683d459cfdf3a8dc6897aa24056b4605016dcfab635f"      // String (required for querying data)

    // protocol: "https",         // String (optional: https | http | auto)
    // host: "api.keen.io/3.0",   // String (optional)
    // requestType: "jsonp"       // String (optional: jsonp, xhr, beacon)
});