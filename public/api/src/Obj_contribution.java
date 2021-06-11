
public class Obj_contribution {
	public String id;
	public String name;
	public String email;
	public String content;
	public String updated;
	public String is_disabled;
	
	public Obj_contribution(String id, String name, String email, String content, String updated, String is_disabled) {
		super();
		this.id = id;
		this.name = name;
		this.email = email;
		this.content = content;
		this.updated = updated;
		this.is_disabled = is_disabled;
	}
	@Override
	public String toString() {
		return "Obj_contribution [id=" + id + ", name=" + name + ", email=" + email + ", content=" + content
				+ ", updated=" + updated + ", is_disabled=" + is_disabled + "]";
	}
	
	
}
