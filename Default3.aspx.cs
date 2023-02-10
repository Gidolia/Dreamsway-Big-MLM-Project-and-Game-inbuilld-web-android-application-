using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.OleDb;
using System.Data;
using System.IO;

public partial class Default3 : System.Web.UI.Page
{
    DataClassesDataContext db = new DataClassesDataContext();
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void btnUpload_Click(object sender, EventArgs e)
    {
        String strConnection = "ConnectionString";
        string connectionString = "";
        if (FileUpload1.HasFile)
        {
            string fileName = Path.GetFileName(FileUpload1.PostedFile.FileName);
            string fileExtension = Path.GetExtension(FileUpload1.PostedFile.FileName);
            string fileLocation = Server.MapPath("~/App_Data/" + fileName);
            FileUpload1.SaveAs(fileLocation);
            if (fileExtension == ".xls")
            {
                connectionString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" +
                  fileLocation + ";Extended Properties=\"Excel 8.0;HDR=Yes;IMEX=2\"";
            }
            else if (fileExtension == ".xlsx")
            {
                connectionString = "Provider=Microsoft.ACE.OLEDB.12.0;Data Source=" +
                  fileLocation + ";Extended Properties=\"Excel 12.0;HDR=Yes;IMEX=2\"";
            }
            OleDbConnection con = new OleDbConnection(connectionString);
            OleDbCommand cmd = new OleDbCommand();
            cmd.CommandType = System.Data.CommandType.Text;
            cmd.Connection = con;
            OleDbDataAdapter dAdapter = new OleDbDataAdapter(cmd);
            DataTable dtExcelRecords = new DataTable();
            con.Open();
            DataTable dtExcelSheetName = con.GetOleDbSchemaTable(OleDbSchemaGuid.Tables, null);
            string getExcelSheetName = dtExcelSheetName.Rows[0]["Table_Name"].ToString();
            cmd.CommandText = "SELECT * FROM [" + getExcelSheetName + "]";
            dAdapter.SelectCommand = cmd;
            dAdapter.Fill(dtExcelRecords);
            gvExcelFile.DataSource = dtExcelRecords;
            gvExcelFile.DataBind();
        }
    }
    protected void btnsave_Click(object sender, EventArgs e)
    {
        int activationID = 1;
        //try
        //{
        //    foreach (GridViewRow r in gvExcelFile.Rows)
        //    {
        //        var updatemember = db.tbl_Member_masters.Single(m => m.PresentationID == r.Cells[6].Text);
        //        if (updatemember.ActivationnId == null)
        //        {
        //            updatemember.ActivationnId = activationID;
        //            db.SubmitChanges();
        //            Literal1.Text = "SUCESS";
        //            activationID++;
        //        }
        //    }
        //}
        //catch (Exception asdasdas)
        //{
        //    Literal1.Text = "ERROR";
        //}

        //try
        //{
        //    foreach (gridviewrow r in gvexcelfile.rows)
        //    {
        //        var updatemember = db.tbl_member_masters.single(m => m.presentationid == r.cells[0].text);
        //        updatemember.activationnid = activationid;
        //        updatemember.status = true;
        //        updatemember.activestatus = true;
        //        db.submitchanges();
        //        literal1.text = "sucess";
        //        activationid++;
        //    }
        //}
        //catch (exception asdasdas)
        //{
        //    literal1.text = "error";
        //}

        try
        {
            foreach (GridViewRow r in gvExcelFile.Rows)
            {
                var updatemember = db.tbl_Member_masters.Single(m => m.PresentationID == r.Cells[1].Text);
                updatemember.debitStatus = true;
                db.SubmitChanges();
                Literal1.Text = "SUCESS";
            }
        }
        catch (Exception asdasdas)
        {
            Literal1.Text = "ERROR";
        }
    }
}