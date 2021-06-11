import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.net.Socket;

public class tcp_client {
	private static final Config CONFIG = Config.getInstance();

	public static void main(String[] args) {
		try {
			int port = CONFIG.getPortMainServer();
			String ip = "localhost";
			
			String id = "1";
			
			if(args.length >= 1) 
				id = args[0];

			if (args.length >= 2)
				port = Integer.parseInt(args[1]);
			
			if (args.length >= 3)
				ip = args[3];

			Socket soc = new Socket(ip, port);
			DataOutputStream dos = new DataOutputStream(soc.getOutputStream());
			DataInputStream dis = new DataInputStream(soc.getInputStream());
			soc.setSoTimeout(1000);
			
			dos.writeUTF(id);
			
			System.out.println(dis.readUTF());

			soc.close();
		} catch (Exception e) {
			e.printStackTrace();
		}

	}
}
