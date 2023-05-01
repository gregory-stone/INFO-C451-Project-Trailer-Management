User inputs from the program interface add/delete/update records in the following tables:

  company
    supervisor only
      update name and address info
  dock_door
    supervisor only
      add/delete/update
  employee
    supervisor only
      add/delete/update
  parking_spot
    supervisor only
      add/delete/update
  warehouse
    supervisor only
      add/delete/update    
  trailer
    gatekeeper - add/delete
    operator - update load and operator fields
    spotter - update parking location fields
  
The following table data should be pulled from an external system, such as an ERP. (Dummy data is included in the sample)
  load_detail
  load_master
  product
  
warehouse_role is only accessible through SQL and should remain static.
