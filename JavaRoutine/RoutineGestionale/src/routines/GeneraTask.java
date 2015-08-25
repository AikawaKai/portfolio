package routines;

import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.io.PrintWriter;
import java.io.UnsupportedEncodingException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.Date;
import java.util.Calendar;


public class GeneraTask {
	
	public static void main(String[] args){
		
		BufferedReader br = null;
		BufferedReader br1 = null;
		int sCurrentLine = -1;
		int sCurrentLine1= -1;

		try {
			
			br = new BufferedReader(new FileReader("lastid.txt"));
			br1 = new BufferedReader(new FileReader("lasttask.txt"));
			sCurrentLine = Integer.valueOf(br.readLine());
			sCurrentLine1 = Integer.valueOf(br1.readLine());
			System.out.println(sCurrentLine+" "+sCurrentLine1);
			

			} catch (IOException e) {
				e.printStackTrace();
			} finally {
				try {
					if (br != null)br.close();
				} catch (IOException ex) {
					ex.printStackTrace();
				}
			}
		
		Connection con = null;
		Statement st = null;
		PreparedStatement statement;
		ResultSet rs = null;
		String url = "jdbc:postgresql://localhost/thepulisher";
		String user = "postgres";
		String password = "postgres";
		String query = "INSERT INTO task VALUES(?,?,?,?)";
		int last_task = sCurrentLine1; 
		int last_id = sCurrentLine;
		if(last_id==4)
			last_id=1;
		Date current_date = new Date(Calendar.getInstance().getTime().getTime());
		
		try{
			con = DriverManager.getConnection(url, user, password);
			statement = con.prepareStatement(query);
			statement.setInt(1, last_task);
			statement.setInt(2,last_id);
			statement.setString(3,"task");
			statement.setDate(4, current_date);
			statement.executeUpdate();
		}catch(SQLException ex){
			ex.printStackTrace();
		} finally {
			try{
				
				if(rs != null){
					rs.close();
				}
				if(st != null){
					st.close();
				}
				if(con != null){
					con.close();
				}
				
			}catch (SQLException e){
				e.printStackTrace();
			}
		}
		PrintWriter writer;
		try {
			writer = new PrintWriter("lastid.txt", "UTF-8");
			last_id++;
			writer.println(String.valueOf(last_id));
			writer.close();
			writer = new PrintWriter("lasttask.txt", "UTF-8");
			last_task++;
			writer.println(String.valueOf(last_task));
			writer.close();
		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (UnsupportedEncodingException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	
	}
	
}
