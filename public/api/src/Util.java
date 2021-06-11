import java.math.BigInteger;
import java.net.URLDecoder;
import java.net.URLEncoder;
import java.security.MessageDigest;

public class Util {
	public static String createListJsonWithNextId(String[] jsonSingles, int nextId) {
		String res = "{";
		res += "\"" + "nextId" + "\"" + ":" + "\"" + nextId + "\"" + ",";
		res += "\"" + "items" + "\"" + ":";
		res += "[";
		int n = jsonSingles.length;
		for (int i = 0; i < n; i++) {
			res += jsonSingles[i];
			if (i != n - 1) {
				res += ",";
			}
		}
		res += "]";
		res += "}";
		return res;
	}

	public static String createListJson(String[] jsonSingles) {
		String res = "[";
		int n = jsonSingles.length;
		for (int i = 0; i < n; i++) {
			res += jsonSingles[i];
			if (i != n - 1) {
				res += ",";
			}
		}
		res += "]";
		return res;
	}

	public static String createJson(String[] lst, String[] values) {
		if (lst.length != values.length)
			return null;
		String res = "{";
		for (int i = 0; i < lst.length; i++) {
			if (i != lst.length - 1) {
				res += "\"" + lst[i] + "\"" + ":" + "\"" + values[i] + "\"" + ",";
			} else {
				res += "\"" + lst[i] + "\"" + ":" + "\"" + values[i] + "\"";
			}
		}
		res += "}";
		return res;
	}

	public static String decode(String s) {
		try {
			String res = URLDecoder.decode(s, "UTF-8");
			return res;
		} catch (Exception e) {
		}
		return null;
	}

	public static String encode(String s) {
		try {
			String res = URLEncoder.encode(s, "UTF-8");
			return res;
		} catch (Exception e) {
		}
		return null;
	}

	public static String convert(String s) {
		try {
			MessageDigest md = MessageDigest.getInstance("MD5");
			byte[] messageDigest = md.digest(s.getBytes());
			BigInteger no = new BigInteger(1, messageDigest);
			String hashtext = no.toString(16);
			while (hashtext.length() < 32) {
				hashtext = "0" + hashtext;
			}
			return hashtext;
		} catch (Exception e) {

		}
		return null;
	}
}
