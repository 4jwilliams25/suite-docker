// SEE IF WE CAN REFACTOR WITH JQUERY

// Method for adding a tag to the UI
function addTag() {
  // Pull the tag list and the tag value entered in the input
  let tagList = JSON.parse($("#tagList").val());
  let tag = $("#newTag").val();

  // Verify the user entered a valid tag via the verifyTag function
  // NEEDS TO BE REFACTORED WITH ERROR HANDLING
  if (verifyTag(tag, tagList)) {
    console.log("Invalid Tag");
  }
  // console.log(tagList);
  // console.log(tag);

  // Grab the input container and create a new input for any additional tags
  let existingDiv = document.getElementById("tagDiv");
  let newInput = document.createElement("div");
  newInput.id = "tag_" + tag;
  newInput.innerHTML =
    "<input type='text' id='" +
    tag +
    "_input' value='" +
    tag +
    "' disabled> <button id='" +
    tag +
    "_remove'type='button'class='btn btn-danger' onclick='removeTag(" +
    '"' +
    tag +
    '"' +
    ")' title='Remove Tag'> <span class='suitepicon suitepicon-action-minus'></span></button>";
  existingDiv.appendChild(newInput);
  // Clear out the primary input for any additional tag entries
  $("#newTag").val("");
}

// Handles the auto-complete functionality in the input
function doAutoComplete(fieldOptions) {
  $("#newTag").autocomplete({
    source: fieldOptions,
  });
}

// Verifies the user entered a valid tag
// NEEDS REFACTOR TO INCLUDE ERROR HANDLING
function verifyTag(tag, tagList) {
  let unexpectedTag = false;

  if (!tagList.includes(tag)) {
    unexpectedTag = true;
  }

  return unexpectedTag;
}

// Handles removing the a tag INPUT and corresponding button
function removeTag(tag) {
  let input = document.getElementById(tag + "_input");
  let button = document.getElementById(tag + "_remove");

  input.remove();
  button.remove();
}
