
public class Obj_role {
	public String id;
	public String name_role;
	public String updated;
	public String is_disabled;
	public Obj_role(String id, String name_role, String updated, String is_disabled) {
		super();
		this.id = id;
		this.name_role = name_role;
		this.updated = updated;
		this.is_disabled = is_disabled;
	}
	@Override
	public String toString() {
		return "Obj_role [id=" + id + ", name_role=" + name_role + ", updated=" + updated + ", is_disabled="
				+ is_disabled + "]";
	}
	
}
