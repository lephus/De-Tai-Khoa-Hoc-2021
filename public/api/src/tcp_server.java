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
import java.util.Vector;

public class tcp_server extends Thread {
	private static final Config CONFIG = Config.getInstance();
	public static int LIMIT = 10;
	public boolean isable2exit = false;
	public Vector<Process> vecProcess = new Vector<Process>();

	public ArrayList<Obj_comment> lst_comment = null;
	public ArrayList<Obj_contribution> lst_contribution = null;
	public ArrayList<Obj_course_detail> lst_course_detail = null;
	public ArrayList<Obj_course> lst_course = null;
	public ArrayList<Obj_funny_detail> lst_funny_detail = null;
	public ArrayList<Obj_funny> lst_funny = null;
	public ArrayList<Obj_hottrend_detail> lst_hottrend_detail = null;
	public ArrayList<Obj_hottrend> lst_hottrend = null;
	public ArrayList<Obj_notification> lst_notification = null;
	public ArrayList<Obj_project_detail> lst_project_detail = null;
	public ArrayList<Obj_project> lst_project = null;
	public ArrayList<Obj_role> lst_role = null;
	public ArrayList<Obj_type_comment> lst_type_comment = null;
	public ArrayList<Obj_user_contribute> lst_user_contribute = null;
	public ArrayList<Obj_user> lst_user = null;
	public ArrayList<Obj_vote> lst_vote = null;

	public static void main(String[] args) {
		new tcp_server(args);
	}

	public tcp_server(String[] args) {
		try {
			int port = CONFIG.getPortMainServer();

			refreshData();
			this.start();

			ServerSocket server = new ServerSocket(port);
			while (!isable2exit) {
				try {
					Socket s = server.accept();
					Process newProcess = new Process(s, this);
					if (newProcess.processCode.equals("stop")) {
						isable2exit = true;
					}
				} catch (Exception e) {
					System.out.println("errP server.accept");
				}
			}
		} catch (Exception e) {
			e.printStackTrace();
		}
	}

	public void run() {
		while (!isable2exit) {
			try {
				Thread.sleep(1 * 60 * 1000);
				refreshData();
			} catch (Exception e) {

			}
		}
	}

	public void refreshData() {
		try {
			long start = new Date().getTime();
			Connection conn = GetConnection();
			
			this.lst_course = GetCourse(conn);
			
			this.lst_notification = GetNotification(conn);
			this.lst_comment = GetComment(conn);
			this.lst_contribution = GetContribution(conn);
			this.lst_course_detail = GetCourseDetail(conn);
			this.lst_funny_detail = GetFunnyDetail(conn);
			this.lst_funny = GetFunny(conn);
			this.lst_hottrend_detail = GetHottrendDetail(conn);
			this.lst_hottrend = GetHottrend(conn);
			this.lst_project_detail = GetProjectDetail(conn);
			this.lst_project = GetProject(conn);
			this.lst_role = GetRole(conn);
			this.lst_type_comment = GetTypeComment(conn);
			this.lst_user_contribute = GetUserContribute(conn);
			this.lst_user = GetUser(conn);
			this.lst_vote = GetVote(conn);
			
			long end = new Date().getTime();
			System.out.println("time load db: " + (end - start));
			conn.close();
		} catch (Exception e) {
			// TODO: handle exception
		}
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
	
	private ArrayList<Obj_vote> GetVote(Connection conn){
		lst_vote = new ArrayList<Obj_vote>();
		try {
			String q = "{ call select_all_vote() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			
			String id, subscribe_yt, member_group, number_post, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				subscribe_yt = rs.getString("subscribe_yt");
				member_group = rs.getString("member_group");
				number_post = rs.getString("number_post");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_vote tmp = new Obj_vote(id, subscribe_yt, member_group, number_post, updated, is_disabled);
				lst_vote.add(tmp);
			}
			return lst_vote;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
		
	}
	
	private ArrayList<Obj_user> GetUser(Connection conn){
		lst_user = new ArrayList<Obj_user>();
		try {
			String q = "{ call select_all_user() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			
			String id, username, pwd, name, major, role_id, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				username = rs.getString("username");
				pwd = rs.getString("pwd");
				name = rs.getString("name");
				major = rs.getString("major");
				role_id = rs.getString("role_id");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_user tmp = new Obj_user(id, username, pwd, name, major, role_id, updated, is_disabled);
				lst_user.add(tmp);
			}
			return lst_user;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}
	
	private ArrayList<Obj_user_contribute> GetUserContribute(Connection conn){
		lst_user_contribute = new ArrayList<Obj_user_contribute>();
		try {
			String q = "{ call select_all_user_contribute() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			
			String id, id_user, ranking, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				id_user = rs.getString("id_user");
				ranking = rs.getString("ranking");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_user_contribute tmp = new Obj_user_contribute(id, id_user, ranking, updated, is_disabled);
				lst_user_contribute.add(tmp);
			}
			return lst_user_contribute;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
		
	}
	private ArrayList<Obj_type_comment> GetTypeComment(Connection conn){
		lst_type_comment = new ArrayList<Obj_type_comment>();

		try {
			String q = "{ call select_all_type_comment() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			
			String id, desc, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				desc = rs.getString("desc");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_type_comment tmp = new Obj_type_comment(id, desc, updated, is_disabled);
				lst_type_comment.add(tmp);
			}
			return lst_type_comment;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}
	
	private ArrayList<Obj_role> GetRole(Connection conn){
		lst_role = new ArrayList<Obj_role>();
		try {
			String q = "{ call select_all_role() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			
			String id, name_role, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				name_role = rs.getString("name_role");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_role tmp = new Obj_role(id, name_role, updated, is_disabled);
				lst_role.add(tmp);
			}
			return lst_role;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}
	
	private ArrayList<Obj_project> GetProject(Connection conn){
		lst_project = new ArrayList<Obj_project>();
		
		try {
			String q = "{ call select_all_project() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			
			String id, title, author, thumbnail, overview, link, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				title = rs.getString("title");
				author = rs.getString("author");
				thumbnail = rs.getString("thumbnail");
				overview = rs.getString("overview");
				link = rs.getString("link");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_project tmp = new Obj_project(id, title, author, thumbnail, overview, link, updated, is_disabled);
				lst_project.add(tmp);
			}
			return lst_project;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}
	
	private ArrayList<Obj_project_detail> GetProjectDetail(Connection conn){
		lst_project_detail = new ArrayList<Obj_project_detail>();
		try {
			String q = "{ call select_all_project_detail() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			
			String id, project_id, content_html, views, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				project_id = rs.getString("project_id");
				content_html = rs.getString("content_html");
				views = rs.getString("views");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_project_detail tmp = new Obj_project_detail(id, project_id, content_html, views, updated, is_disabled);
				lst_project_detail.add(tmp);
			}
			return lst_project_detail;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}
	
	private ArrayList<Obj_hottrend> GetHottrend(Connection conn){
		lst_hottrend = new ArrayList<Obj_hottrend>();
		try {
			String q = "{ call select_all_hottrend() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			
			String id, title, short_desc, thumbnail, link, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				title = rs.getString("title");
				short_desc = rs.getString("short_desc");
				thumbnail = rs.getString("thumbnail");
				link = rs.getString("link");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_hottrend tmp = new Obj_hottrend(id, title, short_desc, thumbnail, link, updated, is_disabled);
				lst_hottrend.add(tmp);
			}
			return lst_hottrend;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}
	private ArrayList<Obj_hottrend_detail> GetHottrendDetail(Connection conn){
		lst_hottrend_detail = new ArrayList<Obj_hottrend_detail>();
		
		try {
			String q = "{ call select_all_hottrend_detail() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			
			String id, id_hottrend, content_html, views, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				id_hottrend = rs.getString("id_hottrend");
				content_html = rs.getString("content_html");
				views = rs.getString("views");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_hottrend_detail tmp = new Obj_hottrend_detail(id, id_hottrend, content_html, views, updated, is_disabled);
				lst_hottrend_detail.add(tmp);
			}
			return lst_hottrend_detail;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
		
	}
	private ArrayList<Obj_funny> GetFunny(Connection conn){
		lst_funny = new ArrayList<Obj_funny>();
		try {
			String q = "{ call select_all_funny() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			
			String id, title, short_desc, thumbnail, link, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				title = rs.getString("title");
				short_desc = rs.getString("short_desc");
				thumbnail = rs.getString("thumbnail");
				link = rs.getString("link");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_funny tmp = new Obj_funny(id, title, short_desc, thumbnail, link, updated, is_disabled);
				lst_funny.add(tmp);
			}
			return lst_funny;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}
	
	private ArrayList<Obj_funny_detail> GetFunnyDetail(Connection conn){
		lst_funny_detail = new ArrayList<Obj_funny_detail>();
		
		try {
			String q = "{ call select_all_funny_detail() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			
			String id, id_funny, content_html, views, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				id_funny = rs.getString("id_funny");
				content_html = rs.getString("content_html");
				views = rs.getString("views");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				
				Obj_funny_detail tmp = new Obj_funny_detail(id, id_funny, content_html, views, updated, is_disabled);
				lst_funny_detail.add(tmp);
			}
			return lst_funny_detail;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}
	
	private ArrayList<Obj_course_detail> GetCourseDetail(Connection conn){
		lst_course_detail = new ArrayList<Obj_course_detail>();

		try {
			String q = "{ call select_all_course_detail() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			
			String id, course_id, content_html, views, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				course_id = rs.getString("course_id");
				content_html = rs.getString("content_html");
				views = rs.getString("views");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_course_detail tmp = new Obj_course_detail(id, course_id, content_html, views, updated, is_disabled);
				lst_course_detail.add(tmp);
			}
			return lst_course_detail;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}
	
	private ArrayList<Obj_contribution> GetContribution(Connection conn){
		lst_contribution = new ArrayList<Obj_contribution>();
		try {
			String q = "{ call select_all_contribution() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			
			String id, name, email, content, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				name = rs.getString("name");
				email = rs.getString("email");
				content = rs.getString("content");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_contribution tmp = new Obj_contribution(id, name, email, content, updated, is_disabled);
				lst_contribution.add(tmp);
			}
			return lst_contribution;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}
	
	private ArrayList<Obj_comment> GetComment(Connection conn){
		lst_comment = new ArrayList<Obj_comment>();
		
		try {
			String q = "{ call select_all_comment() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			
			String id, type_comment_id, content, id_post, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				type_comment_id = rs.getString("type_comment_id");
				content = rs.getString("content");
				id_post = rs.getString("id_post");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_comment tmp = new Obj_comment(id, type_comment_id, content, id_post, updated, is_disabled);
				lst_comment.add(tmp);
			}
			return lst_comment;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}
	
	private ArrayList<Obj_notification> GetNotification(Connection conn){
		lst_notification = new ArrayList<Obj_notification>();
		try {
			String q = "{ call select_all_notification() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			
			String id, content, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				content = rs.getString("content");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_notification tmp = new Obj_notification(id, content, updated, is_disabled);
				lst_notification.add(tmp);
			}
			return lst_notification;
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}
	
	private ArrayList<Obj_course> GetCourse(Connection conn) {
		lst_course = new ArrayList<Obj_course>();
		try {
			String q = "{ call select_all_course() }";
			CallableStatement stmt = conn.prepareCall(q);
			ResultSet rs = stmt.executeQuery();
			String id, title, author, thumbnail, overview, link, updated, is_disabled;
			while (rs.next()) {
				id = rs.getString("id");
				title = rs.getString("title");
				author = rs.getString("author");
				thumbnail = rs.getString("thumbnail");
				overview = rs.getString("overview");
				link = rs.getString("link");
				updated = rs.getString("updated");
				is_disabled = rs.getString("is_disabled");
				Obj_course obj = new Obj_course(id, title, author, thumbnail, overview, link, updated, is_disabled);
				lst_course.add(obj);
			}
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
	public String processCode = "";
	DataInputStream dis;
	DataOutputStream dos;
	String st = "";
	
	public Process(Socket soc, tcp_server server) {
		this.soc = soc;
		this.server = server;
		
		try {
			dis = new DataInputStream(soc.getInputStream());
			dos = new DataOutputStream(soc.getOutputStream());
			soc.setSoTimeout(5000);
			st = dis.readUTF();

			if (st.equals("stop")) {
				this.processCode = "stop";
				dos.writeUTF("Server will stop now");
			} else if (st.equals("")) {
				this.processCode = "timeout";
			} else {
				this.start();
			}
		} catch (Exception e) {
			System.out.println("err");
		}
		
	}

	public void run() {
		try {
			String action = st;
			String table = dis.readUTF();
			String start = dis.readUTF();
			String p_id = ".";

			if (action.equals("getCondition")) {
				p_id = dis.readUTF();
			}

			if (table.equals("course")) {
				String res = process_course(action, table, start, p_id);
				dos.writeUTF(res);
			} else if (table.equals("notification")) {
				// do something
				String res = process_notification(action, table, start, p_id);
				dos.writeUTF(res);
			} else if (table.equals("comment")) {
				// do something
				String res = process_comment(action, table, start, p_id);
				dos.writeUTF(res);
			} else if (table.equals("contribution")) {
				// do something
				String res = process_contribution(action, table, start, p_id);
				dos.writeUTF(res);
			} else if (table.equals("course_detail")) {
				// do something
				String res = process_course_detail(action, table, start, p_id);
				dos.writeUTF(res);
			} else if (table.equals("funny")) {
				// do something
				String res = process_funny(action, table, start, p_id);
				dos.writeUTF(res);
			} else if (table.equals("funny_detail")) {
				// do something
				String res = process_funny_detail(action, table, start, p_id);
				dos.writeUTF(res);
			} else if (table.equals("hottrend")) {
				// do something
				String res = process_hottrend(action, table, start, p_id);
				dos.writeUTF(res);
			} else if (table.equals("hottrend_detail")) {
				// do something
				String res = process_hottrend_detail(action, table, start, p_id);
				dos.writeUTF(res);
			} else if (table.equals("project")) {
				// do something
				String res = process_project(action, table, start, p_id);
				dos.writeUTF(res);
			} else if (table.equals("project_detail")) {
				// do something
				String res = process_project_detail(action, table, start, p_id);
				dos.writeUTF(res);
			} else if (table.equals("role")) {
				// do something
				String res = process_role(action, table, start, p_id);
				dos.writeUTF(res);
			} else if (table.equals("type_comment")) {
				// do something
				String res = process_type_comment(action, table, start, p_id);
				dos.writeUTF(res);
			} else if (table.equals("user")) {
				// do something
				String res = process_user(action, table, start, p_id);
				dos.writeUTF(res);
			} else if (table.equals("user_contribute")) {
				// do something
				String res = process_user_contribute(action, table, start, p_id);
				dos.writeUTF(res);
			} else if (table.equals("vote")) {
				// do something
				String res = process_vote(action, table, start, p_id);
				dos.writeUTF(res);
			} 
			
		} catch (Exception e) {
		}
	}
	
	

	/*
	 * get data (all, condition) for vote
	 */
	public String process_vote(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);

		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_vote t = GetvoteCondition_1(id);
			String[] atts = new String[] { "id", "subscribe_yt", "member_group", "number_post", "updated", "is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.subscribe_yt;
				values[2] = t.member_group;
				values[3] = t.number_post;
				values[4] = t.updated;
				values[5] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_vote> lst_data_vote = GetvoteAll();
			int n = lst_data_vote.size();
			String[] atts = new String[] {"id", "subscribe_yt", "member_group", "number_post", "updated", "is_disabled" };

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_vote temp = lst_data_vote.get(i);
					String[] values = new String[] { temp.id, temp.subscribe_yt, temp.member_group, temp.number_post, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_vote> GetvoteAll() {
		return server.lst_vote;
	}

	public Obj_vote GetvoteCondition_1(String id) {
		Obj_vote res = null;
		for (int i = 0; i < server.lst_vote.size(); i++) {
			if (server.lst_vote.get(i).id.equals(id)) {
				res = server.lst_vote.get(i);
			}
		}
		return res;
	}
	

	/*
	 * get data (all, condition) for user_contribute
	 */
	public String process_user_contribute(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);

		
		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_user_contribute t = Getuser_contributeCondition_1(id);
			String[] atts = new String[] { "id", "id_user", "ranking", "updated", "is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.id_user;
				values[2] = t.ranking;
				values[3] = t.updated;
				values[4] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_user_contribute> lst_data_user_contribute = Getuser_contributeAll();
			int n = lst_data_user_contribute.size();
			String[] atts = new String[] { "id", "id_user", "ranking", "updated", "is_disabled" };

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_user_contribute temp = lst_data_user_contribute.get(i);
					String[] values = new String[] { temp.id, temp.id_user, temp.ranking, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_user_contribute> Getuser_contributeAll() {
		return server.lst_user_contribute;
	}

	public Obj_user_contribute Getuser_contributeCondition_1(String id) {
		Obj_user_contribute res = null;
		for (int i = 0; i < server.lst_user_contribute.size(); i++) {
			if (server.lst_user_contribute.get(i).id.equals(id)) {
				res = server.lst_user_contribute.get(i);
			}
		}
		return res;
	}
	

	/*
	 * get data (all, condition) for user
	 */
	public String process_user(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);

		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_user t = GetuserCondition_1(id);
			String[] atts = new String[] { "id", "username", "pwd","name", "major", "role_id",  "updated", "is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.username;
				values[2] = t.pwd;
				values[3] = t.name;
				values[4] = t.major;
				values[5] = t.role_id;
				values[6] = t.updated;
				values[7] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_user> lst_data_user = GetuserAll();
			int n = lst_data_user.size();
			String[] atts = new String[] {"id", "username", "pwd","name", "major", "role_id",  "updated", "is_disabled"};

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_user temp = lst_data_user.get(i);
					String[] values = new String[] { temp.id, temp.username, temp.pwd, temp.name, temp.major, temp.role_id, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_user> GetuserAll() {
		return server.lst_user;
	}

	public Obj_user GetuserCondition_1(String id) {
		Obj_user res = null;
		for (int i = 0; i < server.lst_user.size(); i++) {
			if (server.lst_user.get(i).id.equals(id)) {
				res = server.lst_user.get(i);
			}
		}
		return res;
	}
	

	/*
	 * get data (all, condition) for type_comment
	 */
	public String process_type_comment(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);

		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_type_comment t = Gettype_commentCondition_1(id);
			String[] atts = new String[] { "id", "desc", "updated", "is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.desc;
				values[2] = t.updated;
				values[3] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_type_comment> lst_data_type_comment = Gettype_commentAll();
			int n = lst_data_type_comment.size();
			String[] atts = new String[] {"id", "desc", "updated", "is_disabled"};

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_type_comment temp = lst_data_type_comment.get(i);
					String[] values = new String[] { temp.id, temp.desc, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_type_comment> Gettype_commentAll() {
		return server.lst_type_comment;
	}

	public Obj_type_comment Gettype_commentCondition_1(String id) {
		Obj_type_comment res = null;
		for (int i = 0; i < server.lst_type_comment.size(); i++) {
			if (server.lst_type_comment.get(i).id.equals(id)) {
				res = server.lst_type_comment.get(i);
			}
		}
		return res;
	}

	/*
	 * get data (all, condition) for role
	 */
	public String process_role(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);

		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_role t = GetroleCondition_1(id);
			String[] atts = new String[] { "id", "name_role", "updated", "is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.name_role;
				values[2] = t.updated;
				values[3] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_role> lst_data_role = GetroleAll();
			int n = lst_data_role.size();
			String[] atts = new String[] {"id", "name_role", "updated", "is_disabled"};

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_role temp = lst_data_role.get(i);
					String[] values = new String[] { temp.id, temp.name_role, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_role> GetroleAll() {
		return server.lst_role;
	}

	public Obj_role GetroleCondition_1(String id) {
		Obj_role res = null;
		for (int i = 0; i < server.lst_role.size(); i++) {
			if (server.lst_role.get(i).id.equals(id)) {
				res = server.lst_role.get(i);
			}
		}
		return res;
	}
	
	
	/*
	 * get data (all, condition) for project_detail
	 */
	public String process_project_detail(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);

		
		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_project_detail t = Getproject_detailCondition_1(id);
			String[] atts = new String[] { "id", "project_id", "content_html", "views", "updated", "is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.project_id;
				values[2] = t.content_html;
				values[3] = t.views;
				values[4] = t.updated;
				values[5] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_project_detail> lst_data_project_detail = Getproject_detailAll();
			int n = lst_data_project_detail.size();
			String[] atts = new String[] { "id", "project_id", "content_html", "views", "updated", "is_disabled" };

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_project_detail temp = lst_data_project_detail.get(i);
					String[] values = new String[] { temp.id, temp.project_id, temp.content_html, temp.views, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_project_detail> Getproject_detailAll() {
		return server.lst_project_detail;
	}

	public Obj_project_detail Getproject_detailCondition_1(String id) {
		Obj_project_detail res = null;
		for (int i = 0; i < server.lst_project_detail.size(); i++) {
			if (server.lst_project_detail.get(i).id.equals(id)) {
				res = server.lst_project_detail.get(i);
			}
		}
		return res;
	}
	
	
	/*
	 * get data (all, condition) for project
	 */
	public String process_project(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);

		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_project t = GetprojectCondition_1(id);
			String[] atts = new String[] { "id", "title", "author", "thumbnail", "overview", "link", "updated", "is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.title;
				values[2] = t.author;
				values[3] = t.thumbnail;
				values[4] = t.overview;
				values[5] = t.link;
				values[6] = t.updated;
				values[7] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_project> lst_data_project = GetprojectAll();
			int n = lst_data_project.size();
			String[] atts = new String[] {  "id", "title", "author", "thumbnail", "overview", "link", "updated", "is_disabled"  };

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_project temp = lst_data_project.get(i);
					String[] values = new String[] { temp.id, temp.title, temp.author, temp.thumbnail, temp.overview, temp.link, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_project> GetprojectAll() {
		return server.lst_project;
	}

	public Obj_project GetprojectCondition_1(String id) {
		Obj_project res = null;
		for (int i = 0; i < server.lst_project.size(); i++) {
			if (server.lst_project.get(i).id.equals(id)) {
				res = server.lst_project.get(i);
			}
		}
		return res;
	}

	/*
	 * get data (all, condition) for hottrend_detail
	 */
	public String process_hottrend_detail(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);

		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_hottrend_detail t = Gethottrend_detailCondition_1(id);
			String[] atts = new String[] { "id", "id_hottrend", "content_html", "views", "updated", "is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.id_hottrend;
				values[2] = t.content_html;
				values[3] = t.views;
				values[4] = t.updated;
				values[5] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_hottrend_detail> lst_data_hottrend_detail = Gethottrend_detailAll();
			int n = lst_data_hottrend_detail.size();
			String[] atts = new String[] { "id", "id_hottrend", "content_html", "views", "updated", "is_disabled" };

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_hottrend_detail temp = lst_data_hottrend_detail.get(i);
					String[] values = new String[] { temp.id, temp.id_hottrend, temp.content_html, temp.views, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_hottrend_detail> Gethottrend_detailAll() {
		return server.lst_hottrend_detail;
	}

	public Obj_hottrend_detail Gethottrend_detailCondition_1(String id) {
		Obj_hottrend_detail res = null;
		for (int i = 0; i < server.lst_hottrend_detail.size(); i++) {
			if (server.lst_hottrend_detail.get(i).id.equals(id)) {
				res = server.lst_hottrend_detail.get(i);
			}
		}
		return res;
	}
	
	
	/*
	 * get data (all, condition) for hottrend
	 */
	public String process_hottrend(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);

		
		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_hottrend t = GethottrendCondition_1(id);
			String[] atts = new String[] { "id", "title", "short_desc", "thumbnail", "link", "updated", "is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.title;
				values[2] = t.short_desc;
				values[3] = t.thumbnail;
				values[4] = t.link;
				values[5] = t.updated;
				values[6] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_hottrend> lst_data_hottrend = GethottrendAll();
			int n = lst_data_hottrend.size();
			String[] atts = new String[] { "id", "title", "short_desc", "thumbnail", "link", "updated", "is_disabled"};

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_hottrend temp = lst_data_hottrend.get(i);
					String[] values = new String[] { temp.id, temp.title, temp.short_desc, temp.thumbnail, temp.link, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_hottrend> GethottrendAll() {
		return server.lst_hottrend;
	}

	public Obj_hottrend GethottrendCondition_1(String id) {
		Obj_hottrend res = null;
		for (int i = 0; i < server.lst_hottrend.size(); i++) {
			if (server.lst_hottrend.get(i).id.equals(id)) {
				res = server.lst_hottrend.get(i);
			}
		}
		return res;
	}
	

	/*
	 * get data (all, condition) for funny_detail
	 */
	public String process_funny_detail(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);

		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_funny_detail t = Getfunny_detailCondition_1(id);
			String[] atts = new String[] { "id", "id_funny", "content_html", "views", "updated", "is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.id_funny;
				values[2] = t.content_html;
				values[3] = t.views;
				values[4] = t.updated;
				values[5] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_funny_detail> lst_data_funny_detail = Getfunny_detailAll();
			int n = lst_data_funny_detail.size();
			String[] atts = new String[] {"id", "id_funny", "content_html", "views", "updated", "is_disabled" };

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_funny_detail temp = lst_data_funny_detail.get(i);
					String[] values = new String[] { temp.id, temp.id_funny, temp.content_html, temp.views, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_funny_detail> Getfunny_detailAll() {
		return server.lst_funny_detail;
	}

	public Obj_funny_detail Getfunny_detailCondition_1(String id) {
		Obj_funny_detail res = null;
		for (int i = 0; i < server.lst_funny_detail.size(); i++) {
			if (server.lst_funny_detail.get(i).id.equals(id)) {
				res = server.lst_funny_detail.get(i);
			}
		}
		return res;
	}


	/*
	 * get data (all, condition) for funny
	 */
	public String process_funny(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);

		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_funny t = GetfunnyCondition_1(id);
			String[] atts = new String[] { "id", "title", "short_desc", "thumbnail", "link", "updated", "is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.title;
				values[2] = t.short_desc;
				values[3] = t.thumbnail;
				values[4] = t.link;
				values[5] = t.updated;
				values[6] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_funny> lst_data_funny = GetfunnyAll();
			int n = lst_data_funny.size();
			String[] atts = new String[] { "id", "title", "short_desc", "thumbnail", "link", "updated", "is_disabled" };

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_funny temp = lst_data_funny.get(i);
					String[] values = new String[] { temp.id, temp.title, temp.short_desc, temp.thumbnail, temp.link, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_funny> GetfunnyAll() {
		return server.lst_funny;
	}

	public Obj_funny GetfunnyCondition_1(String id) {
		Obj_funny res = null;
		for (int i = 0; i < server.lst_funny.size(); i++) {
			if (server.lst_funny.get(i).id.equals(id)) {
				res = server.lst_funny.get(i);
			}
		}
		return res;
	}


	/*
	 * get data (all, condition) for cousre
	 */
	public String process_course(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);

		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_course t = GetCourseCondition_1(id);
			String[] atts = new String[] { "id", "title", "author", "thumbnail", "overview", "link", "updated",
					"is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.title;
				values[2] = t.author;
				values[3] = t.thumbnail;

				values[4] = t.overview;
				values[5] = t.link;
				values[6] = t.updated;
				values[7] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_course> lst_data_course = GetCourseAll();
			int n = lst_data_course.size();
			String[] atts = new String[] { "id", "title", "author", "thumbnail", "overview", "link", "updated",
					"is_disabled" };

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_course temp = lst_data_course.get(i);
					String[] values = new String[] { temp.id, temp.title, temp.author, temp.thumbnail, temp.overview,
							temp.link, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_course> GetCourseAll() {
		return server.lst_course;
	}

	public Obj_course GetCourseCondition_1(String id) {
		Obj_course res = null;
		for (int i = 0; i < server.lst_course.size(); i++) {
			if (server.lst_course.get(i).id.equals(id)) {
				res = server.lst_course.get(i);
			}
		}
		return res;
	}

	/*
	 * get data (all, condition) for course_detail
	 */
	public String process_course_detail(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);
		
		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_course_detail t = Getcourse_detailCondition_1(id);
			String[] atts = new String[] { "id", "course_id", "content_html", "views", "updated", "is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.course_id;
				values[2] = t.content_html;
				values[3] = t.views;
				values[4] = t.updated;
				values[5] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_course_detail> lst_data_course_detail = Getcourse_detailAll();
			
			int n = lst_data_course_detail.size();
			String[] atts = new String[] {"id", "course_id", "content_html", "views", "updated", "is_disabled"};

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_course_detail temp = lst_data_course_detail.get(i);
					String[] values = new String[] { temp.id, temp.course_id, temp.content_html, temp.views, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_course_detail> Getcourse_detailAll() {
		return server.lst_course_detail;
	}

	public Obj_course_detail Getcourse_detailCondition_1(String id) {
		Obj_course_detail res = null;
		for (int i = 0; i < server.lst_course_detail.size(); i++) {
			if (server.lst_course_detail.get(i).id.equals(id)) {
				res = server.lst_course_detail.get(i);
			}
		}
		return res;
	}
	
	/*
	 * get data (all, condition) for contribution
	 */
	public String process_contribution(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);
		
		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_contribution t = GetcontributionCondition_1(id);
			String[] atts = new String[] { "id", "name", "email", "content", "updated", "is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.name;
				values[2] = t.email;
				values[3] = t.content;
				values[4] = t.updated;
				values[5] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_contribution> lst_data_contribution = GetcontributionAll();
			
			int n = lst_data_contribution.size();
			String[] atts = new String[] {"id", "name", "email", "content", "updated", "is_disabled"};

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_contribution temp = lst_data_contribution.get(i);
					String[] values = new String[] { temp.id, temp.name, temp.email, temp.content, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_contribution> GetcontributionAll() {
		return server.lst_contribution;
	}

	public Obj_contribution GetcontributionCondition_1(String id) {
		Obj_contribution res = null;
		for (int i = 0; i < server.lst_contribution.size(); i++) {
			if (server.lst_contribution.get(i).id.equals(id)) {
				res = server.lst_contribution.get(i);
			}
		}
		return res;
	}
	

	/*
	 * get data (all, condition) for comment
	 */
	public String process_comment(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);
		
		
		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_comment t = GetcommentCondition_1(id);
			String[] atts = new String[] { "id", "type_comment_id", "content", "id_post", "updated", "is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.type_comment_id;
				values[2] = t.content;
				values[3] = t.id_post;
				values[4] = t.updated;
				values[5] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_comment> lst_data_comment = GetcommentAll();
			
			int n = lst_data_comment.size();
			String[] atts = new String[] { "id", "type_comment_id", "content", "id_post", "updated", "is_disabled"};

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_comment temp = lst_data_comment.get(i);
					String[] values = new String[] { temp.id, temp.type_comment_id, temp.content, temp.id_post, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_comment> GetcommentAll() {
		return server.lst_comment;
	}

	public Obj_comment GetcommentCondition_1(String id) {
		Obj_comment res = null;
		for (int i = 0; i < server.lst_comment.size(); i++) {
			if (server.lst_comment.get(i).id.equals(id)) {
				res = server.lst_comment.get(i);
			}
		}
		return res;
	}
	
	/*
	 * get data (all, condition) for notification
	 */
	public String process_notification(String action, String table, String start, String p_id) {
		int limit = tcp_server.LIMIT;
		int p = Integer.parseInt(start);
		
		if (action.equals("getCondition")) {
			String id = p_id;
			Obj_notification t = GetNotificationCondition_1(id);
			String[] atts = new String[] { "id", "content", "updated", "is_disabled" };
			String[] values = new String[atts.length];

			if (t == null) {
				String res = "{ \"status\": \"Not found\" }";
				return res;
			} else {
				values[0] = t.id;
				values[1] = t.content;
				values[2] = t.updated;
				values[3] = t.is_disabled;
				String res = Util.createJson(atts, values);
				return res;
			}
		} else { // getAll
			ArrayList<Obj_notification> lst_data_notification = GetNotificationAll();
			int n = lst_data_notification.size();
			String[] atts = new String[] { "id", "content", "updated", "is_disabled" };

			if (p >= n) {
				String[] jsonSingles = new String[0];
				String res = Util.createListJsonWithNextId(jsonSingles, n);
				return res;
			} else {
				int k = 0;
				if (p + limit >= n) {
					k = n - 1;
				} else {
					k = p + limit - 1;
				}
				String[] jsonSingles = new String[k - p + 1];
				int idx = 0;
				for (int i = p; i <= k; i++) {
					Obj_notification temp = lst_data_notification.get(i);
					String[] values = new String[] { temp.id, temp.content, temp.updated, temp.is_disabled };

					String json = Util.createJson(atts, values);
					jsonSingles[idx++] = json;
				}
				int nextId = Math.min(p + limit, n);
				String res = Util.createListJsonWithNextId(jsonSingles, nextId);
				return res;
			}

		}
	}

	public ArrayList<Obj_notification> GetNotificationAll() {
		return server.lst_notification;
	}

	public Obj_notification GetNotificationCondition_1(String id) {
		Obj_notification res = null;
		for (int i = 0; i < server.lst_notification.size(); i++) {
			if (server.lst_notification.get(i).id.equals(id)) {
				res = server.lst_notification.get(i);
			}
		}
		return res;
	}
	

}
