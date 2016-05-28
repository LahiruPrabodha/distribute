var mysql = require("mysql");

function REST_ROUTER(router, connection, md5) {
    var self = this;
    self.handleRoutes(router, connection, md5);
}

REST_ROUTER.prototype.handleRoutes= function(router, connection, md5) {
  router.get("/",function(req,res){

  });

  // routes for staff
  router.post("/staff", function(req, res) {
    var query = "INSERT INTO ??(??, ??, ??, ??) VALUES (?, ?, ?, ?)";
    var table = ["staff", "staffName", "staffEmail", "staffPassword", "staffType", req.body.name, req.body.email, md5(req.body.password), req.body.type];
    query = mysql.format(query, table);
    connection.query(query, function(err, rows) {
        if(err) {
            res.json({"Error" : true, "Message" : "Error executing MySQL query"});
        } else {
            res.json({"Error" : false, "Message" : "Staff Added !"});
        }
    });
  });

  router.put("/staff", function(req, res) {
    var query = "UPDATE ?? SET ??=? , ??=? , ??=? , ??=? WHERE ??=?";
    var table = ["staff", "staffName", req.body.name, "staffEmail",  req.body.email, "staffPassword", md5(req.body.password), "staffType", req.body.type, "staffID", req.body.id];
    query = mysql.format(query, table);
    connection.query(query, function(err, rows) {
        if(err) {
            res.json({"Error" : true, "Message" : "Error executing MySQL query"});
        } else {
            res.json({"Error" : false, "Message" : "Staff updated !"});
        }
    });
  });

  router.get("/staff", function(req, res) {
      var query = "SELECT * FROM ??";
      var table = ["staff"];
      query = mysql.format(query, table);
      connection.query(query, function(err, rows) {
          if(err) {
              res.json({"Error" : true, "Message" : "Error executing MySQL query"});
          } else {
              res.json({"Error" : false, "Message" : "Success", "Staff" : rows});
          }
      });
  });

  router.get("/staff/:email", function(req, res) {
      var query = "SELECT * FROM ?? WHERE ??=?";
      var table = ["staff", "staffEmail", req.params.email];
      query = mysql.format(query,table);
      connection.query(query,function(err, rows) {
          if(err) {
              res.json({"Error" : true, "Message" : "Error executing MySQL query"});
          } else {
              res.json({"Error" : false, "Message" : "Success", "Staff" : rows});
          }
      });
  });

  router.delete("/staff/:email", function(req, res) {
      var query = "DELETE from ?? WHERE ??=?";
      var table = ["staff", "staffEmail", req.params.email];
      query = mysql.format(query, table);
      connection.query(query,function(err, rows) {
          if(err) {
              res.json({"Error" : true, "Message" : "Error executing MySQL query"});
          } else {
              res.json({"Error" : false, "Message" : "Deleted the staff with email " + req.params.email});
          }
      });
  });

  // routes for customer
  router.post("/customer", function(req, res) {
    var query = "INSERT INTO ??(??, ??, ??) VALUES (?, ?, ?)";
    var table = ["customers", "custName", "custEmail", "custPassword", req.body.name, req.body.email, md5(req.body.password)];
    query = mysql.format(query, table);
    connection.query(query, function(err, rows) {
        if(err) {
            res.json({"Error" : true, "Message" : "Error executing MySQL query"});
        } else {
            res.json({"Error" : false, "Message" : "Customer Added !"});
        }
    });
  });

  router.put("/customer", function(req, res) {
    var query = "UPDATE ?? SET ??=? , ??=? , ??=? WHERE ??=?";
    var table = ["customers", "custName", req.body.name, "custEmail",  req.body.email, "custPassword", md5(req.body.password), "custID", req.body.id];
    query = mysql.format(query, table);
    connection.query(query, function(err, rows) {
        if(err) {
            res.json({"Error" : true, "Message" : "Error executing MySQL query"});
        } else {
            res.json({"Error" : false, "Message" : "Customer updated !"});
        }
    });
  });

  router.get("/customer", function(req, res) {
      var query = "SELECT * FROM ??";
      var table = ["customers"];
      query = mysql.format(query, table);
      connection.query(query, function(err, rows) {
          if(err) {
              res.json({"Error" : true, "Message" : "Error executing MySQL query"});
          } else {
              res.json({"Error" : false, "Message" : "Success", "Customers" : rows});
          }
      });
  });

  router.get("/customer/:email", function(req, res) {
      var query = "SELECT * FROM ?? WHERE ??=?";
      var table = ["customers", "custEmail", req.params.email];
      query = mysql.format(query,table);
      connection.query(query,function(err, rows) {
          if(err) {
              res.json({"Error" : true, "Message" : "Error executing MySQL query"});
          } else {
              res.json({"Error" : false, "Message" : "Success", "Customer" : rows});
          }
      });
  });

  router.delete("/customer/:email", function(req, res) {
      var query = "DELETE from ?? WHERE ??=?";
      var table = ["customers", "custEmail", req.params.email];
      query = mysql.format(query, table);
      connection.query(query,function(err, rows) {
          if(err) {
              res.json({"Error" : true, "Message" : "Error executing MySQL query"});
          } else {
              res.json({"Error" : false, "Message" : "Deleted the customer with email " + req.params.email});
          }
      });
  });

  // routes for tables
  router.post("/table", function(req, res) {
    var query = "INSERT INTO ??(??, ??) VALUES (?, ?)";
    var table = ["tables", "tableType", "availability", req.body.type, req.body.availability];
    query = mysql.format(query, table);
    connection.query(query, function(err, rows) {
        if(err) {
            res.json({"Error" : true, "Message" : "Error executing MySQL query"});
        } else {
            res.json({"Error" : false, "Message" : "Table Added !"});
        }
    });
  });

  router.put("/table", function(req, res) {
    var query = "UPDATE ?? SET ??=? , ??=? WHERE ??=?";
    var table = ["tables", "tableType", req.body.type, "availability",  req.body.availability, "tableID", req.body.id];
    query = mysql.format(query, table);
    connection.query(query, function(err, rows) {
        if(err) {
            res.json({"Error" : true, "Message" : "Error executing MySQL query"});
        } else {
            res.json({"Error" : false, "Message" : "Table updated !"});
        }
    });
  });

  router.get("/table", function(req, res) {
      var query = "SELECT * FROM ??";
      var table = ["tables"];
      query = mysql.format(query, table);
      connection.query(query, function(err, rows) {
          if(err) {
              res.json({"Error" : true, "Message" : "Error executing MySQL query"});
          } else {
              res.json({"Error" : false, "Message" : "Success", "Tables" : rows});
          }
      });
  });

  router.get("/table/:tableID", function(req, res) {
      var query = "SELECT * FROM ?? WHERE ??=?";
      var table = ["tables", "tableID", req.params.tableID];
      query = mysql.format(query,table);
      connection.query(query,function(err, rows) {
          if(err) {
              res.json({"Error" : true, "Message" : "Error executing MySQL query"});
          } else {
              res.json({"Error" : false, "Message" : "Success", "Tables" : rows});
          }
      });
  });

  router.delete("/table/:id", function(req, res) {
      var query = "DELETE from ?? WHERE ??=?";
      var table = ["tables", "tableID", req.params.id];
      query = mysql.format(query, table);
      connection.query(query,function(err, rows) {
          if(err) {
              res.json({"Error" : true, "Message" : "Error executing MySQL query"});
          } else {
              res.json({"Error" : false, "Message" : "Deleted the table with id " + req.params.id});
          }
      });
  });

  // routes for reservations
  router.post("/reservation", function(req, res) {
    var query1 = "UPDATE ?? SET ?? = ? WHERE ?? = ?";
    var table1 = ["tables", "availability", "no", "tableID", req.body.tableID];
    query1 = mysql.format(query1, table1);
    connection.query(query1, function(err, data) {
      if(err) {
        res.json({"Error" : true, "Message" : "Cannot update table"});
      }
    });

    var query2 = "INSERT INTO ??(??, ??, ??, ??) VALUES (?, ?, ?, ?)";
    var table2 = ["reservations", "custID_FK", "tableID_FK", "date", "time", req.body.custID, req.body.tableID, req.body.date, req.body.time];
    query2 = mysql.format(query2, table2);
    connection.query(query2, function(err, rows) {
        if(err) {
            res.json({"Error" : true, "Message" : "Error executing MySQL query"});
        } else {
            res.json({"Error" : false, "Message" : "Reservation Added !"});
        }
    });
  });

    router.put("/reservation", function(req, res) {
    var query = "UPDATE ?? SET ??=? , ??=? , ??=? WHERE ??=?";
    var table = ["reservations", "tableID_FK", req.body.tableID, "date",  req.body.date, "time", req.body.time, "reserveID", req.body.id];
    query = mysql.format(query, table);
    connection.query(query, function(err, rows) {
        if(err) {
            res.json({"Error" : true, "Message" : "Error executing MySQL query"});
        } else {
            res.json({"Error" : false, "Message" : "Reservation updated !"});
        }
    });
  });

  router.get("/reservation", function(req, res) {
      var query = "SELECT * FROM ??";
      var table = ["reservations"];
      query = mysql.format(query, table);
      connection.query(query, function(err, rows) {
          if(err) {
              res.json({"Error" : true, "Message" : "Error executing MySQL query"});
          } else {
              res.json({"Error" : false, "Message" : "Success", "Reservations" : rows});
          }
      });
  });

  router.get("/reservation/:ID", function(req, res) {
      var query = "SELECT * FROM ?? WHERE ??=?";
      var table = ["reservations", "custID_FK", req.params.ID];
      query = mysql.format(query, table);
      connection.query(query, function(err, rows) {
          if(err) {
              res.json({"Error" : true, "Message" : "Error executing MySQL query"});
          } else {
              res.json({"Error" : false, "Message" : "Success", "Reservations" : rows});
          }
      });
  });

  router.delete("/reservation/:resID", function(req, res) {
    var tableID;
    var query1 = "SELECT * FROM ?? WHERE ??=?";
    var table1 = ["reservations", "reserveID", req.params.resID];
    query1 = mysql.format(query1, table1);
    connection.query(query1, function(err, rows) {
        if(err) {
            res.json({"Error" : true, "Message" : "Cannot get table ID"});
        } else {
            tableID = rows[0].tableID_FK;
        }
    });

    var query2 = "UPDATE ?? SET ?? = ? WHERE ?? = ?";
    var table2 = ["tables", "availability", "yes", "tableID", tableID];
    query2 = mysql.format(query2, table2);
    connection.query(query2, function(err, data) {
      if(err) {
        res.json({"Error" : true, "Message" : "Cannot update table"});
      }
    });

    var query3 = "DELETE from ?? WHERE ??=?";
    var table3 = ["reservations", "reserveID", req.params.resID];
    query3 = mysql.format(query3, table3);
    connection.query(query3,function(err, rows) {
        if(err) {
            res.json({"Error" : true, "Message" : "Error executing MySQL query"});
        } else {
            res.json({"Error" : false, "Message" : "Deleted the reservation with ID " + req.params.resID});
        }
    });
  });
}

module.exports = REST_ROUTER;
