import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.net.Socket;

public class tcp_client {
	private static final Config CONFIG = Config.getInstance();

	public static void main(String[] args) {
		try {
			String ip = "localhost";
			int port = CONFIG.getPortMainServer();

			//String action = "getCondition"; // getAll
			//String action = "getAll"; // getAll
			String action = "getDetail";
			
			if(args.length >= 1) {
				action = args[0];
			}
			
			
			//String table = "comment";
			//String table = "contribution";
			//String table = "course_detail";
			//String table = "funny";
			//String table = "funny_detail";
			//String table = "hottrend";
			//String table = "hottrend_detail";
			//String table = "project";
			//String table = "project_detail";
			//String table = "role";
			//String table = "type_comment";
			//String table = "user";
			//String table = "user_contribute";
			//String table = "vote";
			//String table = "notification";
			String table = "course";
			
			String start = "0";
			
			String link = "https://gr3atcode.com/detail-post.php/this-is-course-title-f5HFD7638f";
			//String link = "https://gr3atcode.com/detail-post.php/this-is-project-title-f5HFD76767_";
			//String link = "https://gr3atcode.com/detail-post.php/this-is-hottrend-title-f5Hdfsdf_";
			//String link = "https://gr3atcode.com/detail-post.php/this-is-funny-title-f5Hdfsdf";
			
			Socket soc = new Socket(ip, port);
			DataOutputStream dos = new DataOutputStream(soc.getOutputStream());
			DataInputStream dis = new DataInputStream(soc.getInputStream());
			soc.setSoTimeout(1000);
			
			if(action.equals("getCondition")) {
				if(args.length >= 2) {
					table = args[1];
				}
				if(args.length >= 3) {
					start = args[2];
				}
				String p_id = "4"; // custom
				
				if(args.length >= 4) {
					p_id = args[3];
				}
				dos.writeUTF(action);
				dos.writeUTF(table);
				dos.writeUTF(start);
				dos.writeUTF(p_id);
			}
			else if(action.equals("getAll")) {
				if(args.length >= 2) {
					table = args[1];
				}
				if(args.length >= 3) {
					start = args[2];
				}
				
				dos.writeUTF(action);
				dos.writeUTF(table);
				dos.writeUTF(start);
			}
			else if(action.equals("getDetail")) {
				if(args.length >= 2) {
					table = args[1];
				}
				if(args.length >= 3) {
					link = args[2];
				}
				dos.writeUTF(action);
				dos.writeUTF(table);
				dos.writeUTF(link);
			}
			
			System.out.println(dis.readUTF());

			soc.close();
		} catch (Exception e) {
			e.printStackTrace();
		}

	}
}
