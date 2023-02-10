<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Default3.aspx.cs" Inherits="Default3" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    <asp:FileUpload ID="FileUpload1" runat="server" />
                        <br />
                        <asp:Literal ID="Literal1" runat="server"></asp:Literal>
                        <br />
                        <asp:Button ID="btnUpload" runat="server" Text="Upload" CssClass="btn btn-sm btn-primary"
                            OnClick="btnUpload_Click" />
                        &nbsp;<asp:Button ID="btnsave" runat="server" Text="Save" CssClass="btn btn-sm btn-info"
                            OnClick="btnsave_Click" />
                            <asp:GridView ID="gvExcelFile" runat="server" CssClass="table table-bordered" HeaderStyle-CssClass="info">
                        </asp:GridView>
        
    </div>
    </form>
</body>
</html>
