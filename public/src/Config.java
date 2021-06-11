import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.util.HashMap;
import java.util.Map;
import java.util.Scanner;

public class Config {
	private static Config		instance	= new Config();
	private Scanner				sc;
	private Map<String, String>	configMap;
	
	private int					portMainServer;
	private String				mysqlUser;
	private String				mysqlPassword;
	private String				mysqlDatabase;
	private String				hostMysqldatabase;
	private int					portmysqldatabase;
	
	public static Config getInstance() {

		return instance;
	}

	private Config() {
		super();
		readConfig();
	}

	public String getHostMysqldatabase() {

		return hostMysqldatabase;
	}

	public String getMysqlDatabase() {

		return mysqlDatabase;
	}

	public String getMysqlPassword() {

		return mysqlPassword;
	}

	public String getMysqlUser() {

		return mysqlUser;
	}

	public int getPortMainServer() {

		return portMainServer;
	}

	public int getPortmysqldatabase() {

		return portmysqldatabase;
	}

	public Scanner getSc() {

		return sc;
	}
	
	
	public void readConfig() {
		try {
			FileInputStream fis = new FileInputStream("/tmp/public/src/config/config.conf");
			sc = new Scanner(fis);
			configMap = new HashMap<>();

			String[] strings;
			String line;
			while(sc.hasNextLine()) {
				line = sc.nextLine();
				strings = line.split("=");
				if(strings.length != 2) {
					continue;
				}
				String key = strings[0].trim();
				String value = strings[1].trim();
				configMap.put(key, value);
			}

			sc.close();
			fis.close();

			portMainServer = Integer.parseInt(configMap.get("portmainserver"));
			hostMysqldatabase = configMap.get("hostmysqldatabase");
			mysqlDatabase = configMap.get("mysqldatabase");
			mysqlPassword = configMap.get("mysqlpassword");
			mysqlUser = configMap.get("mysqluser");
			portmysqldatabase = Integer.parseInt(configMap.get("portmysqldatabase"));

		} catch(FileNotFoundException e) {
			e.printStackTrace();
		} catch(IOException e) {
			e.printStackTrace();
		}
	}
}
