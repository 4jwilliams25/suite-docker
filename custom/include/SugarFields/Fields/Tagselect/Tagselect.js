function addTag() {
  //Pulls values from html
  let tagNames = JSON.parse($("#tagNames").val());
  let tagIds = JSON.parse($("#tagIds").val());
  let tag = $("#tagInput").val();

  //get tagID from value index
  let tagIndex = tagNames.indexOf(tag);
  let tagID = tagIds[tagIndex];

  //tag verification
  if (verifyTag(tag, tagNames)) {
    console.log("Invalid Tag");
    //Tag not found (throw error)
  }

  //add tag id to hidden value
  if ($("#tags_c").val() === "") {
    $("#tags_c").val(tagID);
  } else {
    let temp = $("#tags_c").val();
    $("#tags_c").val(temp + "," + tagID);
  }
  //creates new input and adds it to the HTML
  let existingDiv = document.getElementById("tagDiv");
  let newInput = document.createElement("div");
  newInput.id = "tag_" + tagID;
  newInput.innerHTML =
    "<input type='text' id='" +
    tagID +
    "_input' value='" +
    tag +
    "' disabled> " +
    "<button id='" +
    tagID +
    "_remove'type='button'class='btn btn-danger' onclick='removeTag(" +
    '"' +
    tagID +
    '"' +
    ")' title='Remove Tag'>" +
    " <span class='suitepicon suitepicon-action-minus'></span></button>";
  existingDiv.appendChild(newInput);

  //blanks out the tag input field
  $("#tagInput").val("");
  $("#tagInput").focus();
}

//Controlls auto complete functionality
function doAutoComplete(fieldOptions) {
  $("#tagInput").autocomplete({
    source: fieldOptions,
  });
}

//Checks to make sure the tag the user inputs is in the accepted list
function verifyTag(tag, tagList) {
  let unexpectedTag = false;

  if (!tagList.includes(tag)) {
    unexpectedTag = true;
  }

  return unexpectedTag;
}

//removes tag from front end
function removeTag(tagID) {
  console.log("Removing tag: " + tagID);
  let selectedTags = $("#tags_c").val();

  if (
    selectedTags.includes("," + tagID) ||
    selectedTags.includes(tagID + ",")
  ) {
    selectedTags = selectedTags.replace("," + tagID, "");
    selectedTags = selectedTags.replace(tagID + ",", "");
    console.log("Multi Tag found");
  } else if (selectedTags.includes(tagID)) {
    console.log("Single Tag found");
    selectedTags = selectedTags.replace(tagID, "");
  }
  // else
  // {
  //     //Tag not found (throw error)
  // }
  $("#tags_c").val(selectedTags);
  console.log("Value should be: " + selectedTags);

  let input = document.getElementById(tagID + "_input");
  let button = document.getElementById(tagID + "_remove");

  input.remove();
  button.remove();
}
