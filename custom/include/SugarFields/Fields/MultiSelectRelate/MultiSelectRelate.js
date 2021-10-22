console.log("My javascript file is loading");

function handleMultiSelectPopup() {
  open_popup(
    "MCCCD_Tags",
    600,
    400,
    "{{$displayParams.initial_filter}}",
    true,
    false,
    {
      call_back_function: "set_return_and_save_background",
      form_name: "DetailView",
      field_to_name_array: { id: "subpanel_id" },
      passthru_data: {
        child_field: "contacts",
        return_url:
          "index.php?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3DContacts%26action%3Dindex%26return_module%3DContacts%26return_action%3DDetailView",
        link_field_name: null,
        module_name: "contacts",
        refresh_page: 0,
        pop_up_type: "MCCCD_Tags",
      },
    },
    "MultiSelect",
    true
  );
}
