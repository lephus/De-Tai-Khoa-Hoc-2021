
public class Obj_user {
	public String id;
	public String username;
	public String pwd;
	public String name;
	public String major;
	public String role_id;
	public String updated;
	public String is_disabled;
	public Obj_user(String id, String username, String pwd, String name, String major, String role_id, String updated,
			String is_disabled) {
		super();
		this.id = id;
		this.username = username;
		this.pwd = pwd;
		this.name = name;
		this.major = major;
		this.role_id = role_id;
		this.updated = updated;
		this.is_disabled = is_disabled;
	}
	@Override
	public String toString() {
		return "Obj_user [id=" + id + ", username=" + username + ", pwd=" + pwd + ", name=" + name + ", major=" + major
				+ ", role_id=" + role_id + ", updated=" + updated + ", is_disabled=" + is_disabled + "]";
	}
	
}
