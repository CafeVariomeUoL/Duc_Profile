/**
 * summary.js
 * Author: Umar Riaz
 * formating the data for the summary page.
 * Rwritten on 09/03/23
 */
$(function () {
  var form = $("#msform");
  $(document).ready(function () {

    $("#userInfo, #userToSum").on("click", function () {
      adduSum();
    });
    $("#pInfo, #profileToSum").on("click", function () {
      addpSum();
    });
    $("#dataInfo, #dataToSum").on("click", function () {
      addRSum();
    });
    $("#conInfo,#conToSum").on("click", function () {
      addCSum();
    });

    $("#vjson").on("click", function () {
      var Json = [];
      var DucProfiler = {};
      var DP = getJson();
      var assets = [];
      var conditions = [];
      DP[1].forEach(function (p) {
        switch (p.Name) {
          case "Profile Name":
            DucProfiler["profileName"] = p.Value;
            break;
          case "Id":
            DucProfiler["profileId"] = p.Value;
            break;
          case "Creation Date":
            DucProfiler["creationDate"] = p.Value;
            break;
          case "Last Update Date":
            DucProfiler["lastUpdated"] = p.Value;
            break;
          case "Permission Mode":
            DucProfiler["permissionMode"] = p.Value;
            break;
          case "Profile Version":
            DucProfiler["profileVersion"] = p.Value;
            break;
          case "Language":
            DucProfiler["language"] = p.Value;
            break;
          default:
            break;
        }

      });
      DucProfiler["ducVersion"] = "0.0.1";
      // Setting Assets to the JSON
      if (DP[2].length > 0) {
        DP[2].forEach(function (asset) {
          let res = {};
          for (const [key, value] of Object.entries(asset)) {
            if (key == "Asset Name") { res["assetName"] = value; }
            if (key == "Asset Description") { res["assetDescription"] = value; }
            if (key == "Asset Uri") { res["assetURI"] = value; }
            if (key == "Asset References") { res["assetReferences"] = value.split(" ;"); }
            // assetReferences
          }
          assets.push(res)
        })
      }
      if (DP[3].length > 0) {
        DP[3].forEach(function (e) {
          var Item = {};
          var con = e[0];
          if (con.length > 0) {
            con.forEach(function (c) {
              if (c.Name == "Use Condition" || c.Name == "Condition Term") {
                Item["conditionTermLabel"] = c.Value;
              } else if (c.Name == "Rule") {
                Item["rule"] = c.Value;
              }
              if (c.Name == "Condition Parameter") {
                Item["conditionParameter"] = c.Value;
              }
              if (c.Name == "Scope") {
                Item["scope"] = c.Value;
              }
              if (c.Name == "Condition Applicability") {
                Item["ruleApplication"] = c.Value;
              }
              // Condition Applicability

              else if (c.Name == "Condition Rule Modifier" || c.Name == "Other Considerations") {
                Item["otherConsiderations"] = c.Value;
              }
            });
          }
          conditions.push(Item);
        });
      }
      let j = JsonToDownload(DucProfiler, assets, conditions);
      var jtoS = JSON.stringify(j, null, 2);
      console.log(jtoS);
      $("#jsn").val('');
      $("#jsn").val(jtoS);
      console.log($("#jsn").val())
      var valid = true;
      if ($('#userinfobody').find('.table-danger').length > 0 || $('#pinfobody').find('.table-danger').length > 0 || $('#datainfobody').find('.table-danger').length > 0 || $('#conditionbody').find('.table-danger').length > 0) {
        valid = false;
      }
      if (valid) {
  
        $("#viewJson").modal({
          show: true,
        });
        $("#jbody").empty();
        $("#jbody").append(`<pre><code>${library.json.prettyPrint(j)}</code></pre>`);

        $("#svjson").click(function () {

           validator = null;
            form.submit();

        });

      } else {
        alert("Please fill all required fields");
      }

      $("#jsdld").click(function(){
  
        J_Download(j);

      })
      $("#exdld").click(function () {

        xls_Download(jtoS)

      })

    }); // $("#vjson").on("click", function () {}) Ending Here








  }); //onReady Function Ending Here
}); // Main Function Ending Here
