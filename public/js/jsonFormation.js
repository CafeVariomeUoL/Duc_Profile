var JsonToUpdate = (json, x) => {
    console.log(JSON.stringify(json, null, 2))
    let k = Object.keys(x)[0];
    let newjson = {};
    if (k == "p") {

        let pobject = {};
        for (const [key, value] of Object.entries(x["p"])) {
            pobject[key] = value;
        }
        // json["profile"] = x["p"];
        pobject["assets"] = json["assets"];
        pobject["conditions"] = json["conditions"];
        newjson["profile"] = pobject;
    }
    if (k == "a") {
        newjson["profile"] = {}
        for (const [key, value] of Object.entries(json["profile"])) {
            if (key == "assets") {
                newjson["profile"][key] = x["a"];
            } else {
                newjson["profile"][key] = value;
            }

        }
    }
    if (k == "c") {
        newjson["profile"] = {}
        for (const [key, value] of Object.entries(json["profile"])) {
            if (key == "conditions") {
                newjson["profile"][key] = x["c"];
            } else {
                newjson["profile"][key] = value;
            }

        }
        
    }
    console.log(newjson);
    return JSON.stringify(newjson, null, 2);
}
var JsonToDownload = (p, a, c) => {
    _jsontoDownload = {};
    _jsontoDownload["profile"] = p;
    _jsontoDownload["profile"]["assets"] = a;
    _jsontoDownload["profile"]["conditions"] = c;
    return _jsontoDownload;
}
