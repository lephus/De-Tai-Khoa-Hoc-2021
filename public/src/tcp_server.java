import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.net.ServerSocket;
import java.net.Socket;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.Date;

public class tcp_server {
	private static final Config CONFIG = Config.getInstance();

	public ArrayList<Obj_course> lst_course = null;

	public static void main(String[] args) {
		new tcp_server(args);
	}

	public tcp_server(String[] args) {
		try {
			int port = CONFIG.getPortMainServer();

			refreshData();
			
			ServerSocket server = new ServerSocket(port);
			while (true) {
				Socket soc = server.accept();
				new Process(soc, this).start();
			}

		} catch (Exception e) {
			e.printStackTrace();
		}
	}

	public void refreshData() {
		long start = new Date().getTime();

		this.lst_course = GetCourse();

		long end = new Date().getTime();
		System.out.println("time load db: " + (end - start));
	}

	private Connection GetConnection() {
		try {
			Class.forName("com.mysql.jdbc.Driver");
			Connection conn = null;
			conn = DriverManager.getConnection(
					"jdbc:mysql://" + CONFIG.getHostMysqldatabase() + "/" + CONFIG.getMysqlDatabase(),
					CONFIG.getMysqlUser(), CONFIG.getMysqlPassword());
			return conn;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}

	private ArrayList<Obj_course> GetCourse() {
		lst_course = new ArrayList<Obj_course>();

		try {
			Connection conn = GetConnection();
			String q = "{ call select_all_course() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();

			String id, title, author, overview, link, updated, is_disabled;

			while (rs.next()) {
				id = rs.getString("id");
				title = rs.getString("title");
				author = rs.getString("author");
				overview = rs.getString("overview");
				link = rs.getString("link");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_course obj = new Obj_course(id, title, author, overview, link, updated, is_disabled);
				lst_course.add(obj);
			}
			System.out.println("GetCourse - Done!");
			conn.close();
			return lst_course;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}

	}
}


class Process extends Thread {
	Socket soc;
	tcp_server server;
	
	public Process(Socket soc, tcp_server server) {
		this.soc = soc;
		this.server = server;
	}

	public void run() {
		try {
			DataInputStream dis = new DataInputStream(soc.getInputStream());
			DataOutputStream dos = new DataOutputStream(soc.getOutputStream());
			String id = dis.readUTF();
			String res = GetCourseData(id);
			dos.writeUTF(res);
		} catch (Exception e) {
		}
	}
	
	public String GetCourseData(String id) {
		String res = ".";
		for(int i = 0; i < server.lst_course.size(); i++) {
			if(server.lst_course.get(i).id.equals(id)) {
				res = server.lst_course.get(i).author;
			}
		}
		return res;
	}
}













