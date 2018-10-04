  //////////////////////////////////////////////////////////////////////
  function handlerSubmit() {
    var new_id = document.forms["change_json"].elements["id"].value;
    if (new_id == "") {
      alert("id can not be empy. Sorry :(");
      return;
    }
    else {
      var new_attrib_string = document.forms["change_json"].elements["attrib_string"].value;
      var new_attrib_number = document.forms["change_json"].elements["attrib_number"].value;

      var new_element = {
        id: new_id,
        attrib_string: new_attrib_string,
        attrib_number: new_attrib_number
      };

      var json_string = document.getElementById("html_json_section").innerHTML;
      var json_object = JSON.parse(json_string);
      json_object.elements.push(new_element);

      var json_string_updated = JSON.stringify(json_object, undefined, 2);
      document.getElementById("html_json_section").innerHTML = json_string_updated;

      document.forms["change_json"].reset();
    }
  }
  //////////////////////////////////////////////////////////////////////

  var json_object = {
    elements: [{
        id: 1,
        attrib_string: "a",
        attrib_number: 5
      },
      {
        id: 2,
        attrib_string: "b",
        attrib_number: 5
      }
    ]
  };
  //JSON.stringify(value[, replacer[, space]])
  var json_string = JSON.stringify(json_object, undefined, 2);
  document.getElementById("html_json_section").innerHTML = json_string;
